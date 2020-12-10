<?php
  require('./src/classes/model/Passenger.php');

  $srcPassengerForm = './src/classes/controller/PassengerForm.php';
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="static/css/styles.css">

  <script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
  <script src="static/js/scripts.js"></script>
  <script src="https://kit.fontawesome.com/0eb5daf58c.js" crossorigin="anonymous"></script>

  <title>Listagem de passageiros</title>
</head>
<body>
  <header>
    <nav class="nav-top-menu">
      <ul class="menu">
        <li class="menu-items">
          <a href="./src/classes/controller/FlightList.php">Vôos</a>
        </li>
        <li class="menu-items current">
          <a href="#">Passageiros</a>
        </li>
      </ul>
    </nav>

    <div class="header-title">
      <span>Lista de Passageiros</span>
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
              <th></th>
            </tr>
          </thead>

          <tbody>
            <?php
              $passengers = [];

              $passengerOne = Passenger::create()
                ->setDocument('123.456.789-87')
                ->setName('Anderson')
                ->setEmail('anderson@email.com')
                ->setPhone('77 98765-4321')
                ->setGender('Masculino');
              
              $passengers[] = $passengerOne;

              foreach ($passengers as $passenger):
            ?>
              <tr>
                <td><?php echo $passenger->getDocument() ?></td>
                <td><?php echo $passenger->getName() ?></td>
                <td><?php echo $passenger->getEmail() ?></td>
                <td><?php echo $passenger->getPhone() ?></td>
                <td><?php echo $passenger->getGender() ?></td>
                <td>
                  <a href="<?php echo $srcPassengerForm . '?document=' . $passenger->getDocument() ?>" class='btn btn-default'>
                    <i class='fa fa-edit'></i>
                  </a>
                  <a href='#' class='btn btn-red'>
                    <i class='fa fa-trash'></i>
                  </a>
                </td>
              </tr>
            <?php endforeach; ?>

            <tr>
              <td>111.111.111-11</td>
              <td>Anderson Rocha</td>
              <td>anderson@email.com</td>
              <td>77 99999-9999</td>
              <td>Masculino</td>
              <td>
                <a href="#" class="btn btn-default">
                  <i class="fa fa-edit"></i>
                </a>
                <a href="#" class="btn btn-red">
                  <i class="fa fa-trash"></i>
                </a>
              </td>
            </tr>
            <tr>
              <td>222.222.222-22</td>
              <td>Carlos Eduardo</td>
              <td>carlos@email.com</td>
              <td>77 98888-8888</td>
              <td>Masculino</td>
              <td>
                <a href="#" class="btn btn-default">
                  <i class="fa fa-edit"></i>
                </a>
                <a href="#" class="btn btn-red">
                  <i class="fa fa-trash"></i>
                </a>
              </td>
            </tr>
            <tr>
              <td>333.333.333-33</td>
              <td>João Pedro</td>
              <td>joao@email.com</td>
              <td>77 97777-7777</td>
              <td>Masculino</td>
              <td>
                <a href="#" class="btn btn-default">
                  <i class="fa fa-edit"></i>
                </a>
                <a href="#" class="btn btn-red">
                  <i class="fa fa-trash"></i>
                </a>
              </td>
            </tr>
            <tr>
              <td>444.444.444-44</td>
              <td>Marco Antonio</td>
              <td>marco@email.com</td>
              <td>77 96666-6666</td>
              <td>Masculino</td>
              <td>
                <a href="#" class="btn btn-default">
                  <i class="fa fa-edit"></i>
                </a>
                <a href="#" class="btn btn-red">
                  <i class="fa fa-trash"></i>
                </a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <div>
        <a href="<?php echo $srcPassengerForm ?>" class="btn btn-green">
          <i class="fas fa-plus"></i> Adicionar passageiro
        </a>
      </div>
    </section>
  </main>
</body>
</html>