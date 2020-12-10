<?php
  require('../model/Passenger.php');
  
  $document = $_GET['document'] ?? '';
  
  $passenger = Passenger::create();

  if (!empty($document)) {
      // buscar pelo documento
  }
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="../../../static/css/styles.css">

  <script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
  <script src="../../../static/js/scripts.js"></script>
  <script src="https://kit.fontawesome.com/0eb5daf58c.js" crossorigin="anonymous"></script>

  <title>Cadastrar passageiro</title>
</head>
<body>
  <header>
    <div class="header-title">
      <?php if (empty($document)): ?>
        <span>Cadastrar Passageiro</span>
      <?php else: ?>
        <span>Editar Passageiro</span>
      <?php endif ?>
    </div>
  </header>

  <main>
    <section class="container">
      <div class="form">
        <form method="POST" action="PassengerSave.php">
          <div class="form-input">
            <input 
              type="text" 
              name="document" 
              id="document" 
              value="<?php echo $passenger->getDocument() ?>"
              autocomplete="off"
            >
            <label for="document">Documento</label>
          </div>
          
          <div class="form-input">
            <input 
              type="text" 
              name="name" 
              id="name" 
              value="<?php echo $passenger->getName() ?>"
              autocomplete="off"
            >
            <label for="name">Nome</label>
          </div>
          
          <div class="form-input">
            <input 
              type="email" 
              name="email" 
              id="email" 
              value="<?php echo $passenger->getEmail() ?>"
              autocomplete="off"
            >
            <label for="email">Email</label>
          </div>
          
          <div class="form-input">
            <input 
              type="tel" 
              name="phone" 
              id="phone" 
              value="<?php echo $passenger->getPhone() ?>"
              autocomplete="off"
            >
            <label for="phone">Telefone</label>
          </div>
          
          <div class="form-input">
            <div class="input">
              <label for="gender_male">Homem</label>
              <input 
                type="radio" 
                name="gender" 
                id="gender_male" 
                <?php echo $passenger->getGender() === 'male' ? 'checked' : ''; ?> 
              >

              <label for="gender_female">Mulher</label>
              <input 
                type="radio" 
                name="gender" 
                id="gender_female" 
                <?php echo $passenger->getGender() === 'female' ? 'checked' : ''; ?> 
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