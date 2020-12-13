<?php
    require './CassandraDAO.php';

    $cassandraDAO = new CassandraDAO();

    $pointsRegister = $cassandraDAO->getPointsRegister();
    $srcPointForm = './register-point.php';
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

    <title>Listagem de registros de ponto</title>
</head>
<body>
<header>
    <nav class="nav-top-menu">
        <ul class="menu">
            <li class="menu-items">
                <a href="/">Funcionários</a>
            </li>
            <li class="menu-items current">
                <a href="#">Registro de ponto</a>
            </li>
        </ul>
    </nav>

    <div class="header-title">
        <span>Lista de registros de ponto</span>
    </div>
</header>

<main>
    <section class="container">
        <div class="table-list">
            <table class="table-result">
                <thead class="thead-dark">
                <tr>
                    <th>Funcionário</th>
                    <th>Documento</th>
                    <th>Data e hora</th>
                    <th>Observações</th>
                </tr>
                </thead>

                <tbody>
                <?php foreach ($pointsRegister as $point): ?>
                    <tr>
                        <td><?php echo $point['employee'] ?></td>
                        <td><?php echo $point['document'] ?></td>
                        <td><?php echo $point['datetime'] ?></td>
                        <td><?php echo $point['note'] ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div>
            <a href="<?php echo $srcPointForm ?>" class="btn btn-green">
                <i class="fas fa-plus"></i> Registrar ponto
            </a>
        </div>
    </section>
</main>
</body>
</html>