<?php
    date_default_timezone_set('America/Bahia');
    require './CassandraDAO.php';

    $cassandraDAO = new CassandraDAO();

    $employees = $cassandraDAO->getEmployeesForCombo();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="static/css/styles.css">

    <script src="static/js/jquery.js"></script>
    <script src="static/js/jquery.mask.min.js"></script>
    <script src="static/js/scripts.js"></script>
    <script src="https://kit.fontawesome.com/0eb5daf58c.js" crossorigin="anonymous"></script>

    <title>Registrar ponto</title>
</head>
<body>
<header>
    <div class="header-title">
        <span>Registrar ponto</span>
    </div>
</header>

<main>
    <section class="container">
        <div class="form">
            <form method="POST" action="save-point.php">
                <div class="form-input">
                    <select name="employee" id="employee" required>
                        <option value=""></option>
                        <?php foreach ($employees as $employee): ?>
                            <option value="<?php echo $employee['document'] ?>"><?php echo $employee['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <label for="employee">Funcionário</label>
                </div>

                <div class="row-input">
                    <div class="form-input">
                        <input
                            type="date"
                            name="date"
                            id="date"
                            autocomplete="off"
                            class="input-filled-flight"
                            value="<?php echo date('Y-m-d') ?>"
                            readonly="readonly"
                            required
                        >
                        <label for="date" class="label-top-flight">Data</label>
                    </div>

                    <div class="form-input">
                        <input
                            type="time"
                            name="time"
                            id="time"
                            autocomplete="off"
                            class="input-filled-flight"
                            value="<?php echo date('H:i') ?>"
                            readonly="readonly"
                            required
                        >
                        <label for="time" class="label-top-flight">Horário</label>
                    </div>
                </div>

                <div class="form-input">
                    <textarea
                        name="note"
                        id="note"
                        maxlength="120"
                    ></textarea>
                    <label for="note">Observações</label>
                </div>

                <button type="submit" class="btn btn-save">
                    <i class="fas fa-save"></i> Salvar
                    <button>
            </form>
        </div>
    </section>
</main>
</body>
</html>