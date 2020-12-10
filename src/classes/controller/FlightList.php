<?php
  require('../model/Flight.php');

  $srcFlightForm = './FlightForm.php';
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

  <title>Listagem de vôos</title>
</head>
<body>
  <header>
    <nav class="nav-top-menu">
      <ul class="menu">
        <li class="menu-items current">
          <a href="#">Vôos</a>
        </li>
        <li class="menu-items">
          <a href="/">Passageiros</a>
        </li>
      </ul>
    </nav>

    <div class="header-title">
      <span>Lista de vôos</span>
    </div>
  </header>

  <main>
    <section class="container">
      <div class="table-list">
        <table class="table-result">
          <thead class="thead-dark">
            <tr>
              <th>Origem</th>
              <th>Destino</th>
              <th>Data</th>
              <th>Horário de Embarque</th>
              <th>Capacidade</th>
              <th></th>
            </tr>
          </thead>

          <tbody>
            <?php
              $flights = [];

              $fligthOne = Flight::create()
                ->setOrigin('São Paulo')
                ->setDestination('Rio de Janeiro')
                ->setDate('25/12/2020')
                ->setBoardingTime('12:30')
                ->setCapacity(150);
              
              $flights[] = $fligthOne;

              foreach ($flights as $flight):
            ?>
              <tr>
                <td><?php echo $flight->getOrigin() ?></td>
                <td><?php echo $flight->getDestination() ?></td>
                <td><?php echo $flight->getDate() ?></td>
                <td><?php echo $flight->getBoardingTime() ?></td>
                <td><?php echo $flight->getCapacity() ?></td>
                <td>
                  <a href="<?php echo $srcFlightForm . '?id=' . $flight->getId() ?>" class='btn btn-default'>
                    <i class='fa fa-edit'></i>
                  </a>
                  <a href='#' class='btn btn-red'>
                    <i class='fa fa-trash'></i>
                  </a>
                </td>
              </tr>
            <?php endforeach; ?>

          </tbody>
        </table>
      </div>

      <div>
        <a href="<?php echo $srcFlightForm ?>" class="btn btn-green">
          <i class="fas fa-plus"></i> Adicionar vôo
        </a>
      </div>
    </section>
  </main>
</body>
</html>