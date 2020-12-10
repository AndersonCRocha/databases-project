<?php
  require('../model/Flight.php');
  
  $id = $_GET['id'] ?? '';
  
  $flight = Flight::create();

  if (!empty($id)) {
      // buscar pelo id
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

  <title>Cadastrar vôo</title>
</head>
<body>
  <header>
    <div class="header-title">
      <?php if (empty($id)): ?>
        <span>Cadastrar Vôo</span>
      <?php else: ?>
        <span>Editar Vôo</span>
      <?php endif ?>
    </div>
  </header>

  <main>
    <section class="container">
      <div class="form">
        <form method="POST" action="FlightSave.php">
          <input type="hidden" name="id" value="<?php echo $flight->getId() ?>">
          <div class="form-input">
            <input 
              type="text" 
              name="origin" 
              id="origin" 
              value="<?php echo $flight->getOrigin() ?>"
              autocomplete="off"
            >
            <label for="origin">Origem</label>
          </div>
          
          <div class="form-input">
            <input 
              type="text" 
              name="destination" 
              id="destination" 
              value="<?php echo $flight->getDestination() ?>"
              autocomplete="off"
            >
            <label for="destination">Destino</label>
          </div>

          <div class="row-input">
            <div class="form-input">
              <input 
                type="date" 
                name="date" 
                id="date" 
                value="<?php echo $flight->getDate() ?>"
                autocomplete="off"
                class="input-filled-flight"
              >
              <label for="date" class="label-top-flight">Data</label>
            </div>
            
            <div class="form-input">
              <input 
                type="time" 
                name="boardingTime" 
                id="phoboardingTimene" 
                value="<?php echo $flight->getBoardingTime() ?>"
                autocomplete="off"
                class="input-filled-flight"
              >
              <label for="boardingTime" class="label-top-flight">Horário de embarque</label>
            </div>
          </div>
          
          <div class="form-input">
            <input 
              type="number" 
              name="capacity" 
              id="capacity" 
              value="<?php echo $flight->getCapacity() ?>"
              autocomplete="off"
            >
            <label for="capacity">Lotação máxima</label>
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