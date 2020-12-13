<?php
    require_once './CassandraDAO.php';

    $cassandraDAO = new CassandraDAO();

    $success = $cassandraDAO->savePointRegister($_POST['employee'], $_POST['note']);

    if ($success) {
        header('Location: points-list.php');
        exit();
    } else {
        echo "Ocorreu um erro ao tentar registrar o ponto. <a href='register-point.php'>Retornar</a>";
    }

