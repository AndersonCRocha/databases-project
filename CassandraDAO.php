<?php

require './Cassandra.php';

use Cassandra\Exception;
use Cassandra\Type\Timestamp;

class CassandraDAO
{
    /**
     * @var \Cassandra\Connection
     */
    private $connection;

    public function __construct()
    {
        $this->connection = Cassandra::getConnection();
    }

    public function save($employee)
    {
        try {
            $cql = 'INSERT INTO "employees" ("document", "name", "email", "phone", "gender", "salary") 
                VALUES (:document, :name, :email, :phone, :gender, :salary)';

            $this->connection->querySync($cql, $employee, null, ['names_for_values' => true]);
            return true;
        } catch (Cassandra\Exception $e) {
            return false;
        }
    }

    public function getEmployees()
    {
        $result = $this->connection->querySync('SELECT * FROM "employees"');
        $employees = (array)$result->fetchAll();

        usort($employees, function($a, $b) {
            return $a['name'] >= $b['name'];
        });

        return $employees;
    }

    public function getEmployeesForCombo()
    {
        $result = $this->connection->querySync('SELECT "document", "name" FROM "employees"');
        $employees = (array)$result->fetchAll();

        usort($employees, function($a, $b) {
            return $a['name'] >= $b['name'];
        });

        return $employees;
    }

    public function getEmployeeByDocument($document) {
        $result = $this->connection->querySync('SELECT * FROM "employees" WHERE "document" = :document', [
            'document' => $document
        ], null, ['names_for_values' => true]);

        return $result->fetchRow();
    }

    public function deleteByDocument($document)
    {
        try {
            $result = $this->connection->querySync(
                "DELETE FROM \"employees\" WHERE \"document\" = '$document'"
            );
            $result->fetchRow();
        } catch(Exception $e) {
        }
    }

    public function getPointsRegister()
    {
        try {
            $pointsRegister = [];
            $result = $this->connection->querySync('SELECT "document", "name", "points_register" FROM "employees"');
            $employees = (array) $result->fetchAll();

            foreach ($employees as $employee) {
                if (isset($employee['points_register'])) {
                    foreach ($employee['points_register'] as $point) {
                        $pointsRegister[] = [
                            'document' => $employee['document'],
                            'employee' => $employee['name'],
                            'datetime' => date('d-m-Y H:i:s', $point['date']),
                            'note' => $point['note'],
                        ];
                    }
                }
            }

            usort($pointsRegister, function ($a, $b) {
                if ($a['employee'] !== $b['employee']) {
                    return $a['employee'] > $b['employee'];
                } else {
                    return $b['datetime'] >= $a['datetime'];
                }
            });

            return $pointsRegister;
        } catch (Cassandra\Exception $e) {
            return [];
        }
    }

    public function savePointRegister($document, $note)
    {
        $now = new Timestamp(microtime(true) - (3 * 60 * 60));
        $point = "{date:'$now', note:'$note'}";

        try {
            $cql = 'UPDATE "employees" SET "points_register" = "points_register" + ['.$point.'] WHERE "document" = :document';

            $this->connection->querySync($cql, ['document' => $document], null, ['names_for_values' => true]);

            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}