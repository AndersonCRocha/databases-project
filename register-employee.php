<?php
    require './CassandraDAO.php';

    $document = $_GET['document'] ?? '';

    $cassandraDAO = new CassandraDAO();

    $employee = !empty($document) ? $cassandraDAO->getEmployeeByDocument($document) : [];
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

    <title>Cadastrar Funcionário</title>
</head>
<body>
<header>
    <div class="header-title">
        <?php if (empty($document)): ?>
            <span>Cadastrar Funcionário</span>
        <?php else: ?>
            <span>Editar Funcionário</span>
        <?php endif ?>
    </div>
</header>

<main>
    <section class="container">
        <div class="form">
            <form method="POST" action="/">
                <div class="form-input">
                    <input
                        type="text"
                        name="document"
                        id="document"
                        value="<?php echo $employee['document'] ?? '' ?>"
                        autocomplete="off"
                        class="cpf"
                        required
                    >
                    <label for="document">Documento (CPF)</label>
                </div>

                <div class="form-input">
                    <input
                        type="text"
                        name="name"
                        id="name"
                        value="<?php echo $employee['name'] ?? '' ?>"
                        autocomplete="off"
                        required
                    >
                    <label for="name">Nome</label>
                </div>

                <div class="form-input">
                    <input
                        type="email"
                        name="email"
                        id="email"
                        value="<?php echo $employee['email'] ?? '' ?>"
                        autocomplete="off"
                        required
                    >
                    <label for="email">Email</label>
                </div>

                <div class="form-input">
                    <input
                        type="tel"
                        name="phone"
                        id="phone"
                        class="phone"
                        value="<?php echo $employee['phone'] ?? '' ?>"
                        autocomplete="off"
                        required
                    >
                    <label for="phone">Telefone</label>
                </div>

                <div class="form-input">
                    <input
                        type="text"
                        name="salary"
                        id="salary"
                        class="money"
                        value="<?php echo $employee['salary'] ?? '' ?>"
                        autocomplete="off"
                        required
                    >
                    <label for="salary">Salário</label>
                </div>

                <div class="form-input">
                    <div class="input">
                        <label for="gender_male">Homem</label>
                        <input
                            type="radio"
                            name="gender"
                            id="gender_male"
                            value="male"
                            <?php echo isset($employee['gender']) && ($employee['gender'] === 'male') ? 'checked' : ''; ?>
                        >

                        <label for="gender_female">Mulher</label>
                        <input
                            type="radio"
                            name="gender"
                            id="gender_female"
                            value="female"
                            <?php echo isset($employee['gender']) && ($employee['gender'] === 'female') ? 'checked' : ''; ?>
                        >
                    </div>
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