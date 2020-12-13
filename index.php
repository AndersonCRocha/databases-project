<?php
    require './CassandraDAO.php';

    $cassandraDAO = new CassandraDAO();

    $GENDERS = [
        'M' => 'Masculino',
        'F' => 'Feminino'
    ];
    $isPostMethod = isset($_POST['document']);

    if ($isPostMethod) {
        $employee = [
            'document' => $_POST['document'],
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'phone' => $_POST['phone'],
            'gender' => $_POST['gender'],
            'salary' => new Cassandra\Type\Double((double)str_replace('.', '', $_POST['salary'])),
        ];

        $success = $cassandraDAO->save($employee);
        $_SESSION['msg'] = $success ? "Funcionário salvo com sucesso" : "Ocorreu um erro ao tentar cadastrar o funcionário";
    }

    $isDeleteAction = isset($_GET['delete']);

    if ($isDeleteAction) {
        $cassandraDAO->deleteByDocument($_GET['document']);
    }

    $employees = $cassandraDAO->getEmployees();
    $srcEmployeeForm = 'register-employee.php';
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="static/css/styles.css">

    <script src="https://kit.fontawesome.com/0eb5daf58c.js" crossorigin="anonymous"></script>

    <title>Listagem de funcionários</title>
</head>
<body>
<header>
    <nav class="nav-top-menu">
        <ul class="menu">
            <li class="menu-items current">
                <a href="#">Funcionários</a>
            </li>
            <li class="menu-items">
                <a href="points-list.php">Registro de ponto</a>
            </li>
        </ul>
    </nav>

    <div class="header-title">
        <span>Lista de funcionários</span>
    </div>
</header>

<main>
    <section class="container">
        <div class="table-list">
            <table class="table-result">
                <thead class="thead-dark">
                <tr>
                    <th>Documento</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>Sexo</th>
                    <th>Salário</th>
                    <th></th>
                </tr>
                </thead>

                <tbody>
                <?php foreach ($employees as $employee): ?>
                    <tr>
                        <td><?php echo $employee['document'] ?></td>
                        <td><?php echo $employee['name'] ?></td>
                        <td><?php echo $employee['email'] ?></td>
                        <td><?php echo $employee['phone'] ?></td>
                        <td><?php echo $GENDERS[$employee['gender']] ?></td>
                        <td><?php echo $employee['salary'] ?></td>
                        <td>
                            <a href="<?php echo $srcEmployeeForm.'?document='.$employee['document'] ?>" class='btn btn-default'>
                                <i class='fa fa-edit'></i>
                            </a>
                            <a href='<?php echo 'index.php?delete=true&document='.$employee['document'] ?>' class='btn btn-red'>
                                <i class='fa fa-trash'></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div>
            <a href="<?php echo $srcEmployeeForm ?>" class="btn btn-green">
                <i class="fas fa-plus"></i> Adicionar funcionário
            </a>
        </div>
    </section>
</main>
<?php if (isset($_SESSION['msg'])): ?>
    <script>
        alert('<?php echo $_SESSION['msg']; unset($_SESSION['msg']); ?>');
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
    </script>
<?php endif; ?>
</body>
</html>