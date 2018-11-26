<!DOCTYPE html>
<html lang="en">

<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="assets/web/assets/mobirise-icons2/mobirise2.css">
  <link rel="stylesheet" href="assets/web/assets/mobirise-icons-bold/mobirise-icons-bold.css">
  <link rel="stylesheet" href="assets/web/assets/mobirise-icons/mobirise-icons.css">
  <link rel="stylesheet" href="assets/tether/tether.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="assets/dropdown/css/style.css">
  <link rel="stylesheet" href="assets/theme/css/style.css">
  <link rel="stylesheet" href="assets/gallery/style.css">
  <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
</head>

<body>
  <?php
    include 'headerN.php';
  ?>

      <section class="mbr-section content5 cid-racjG1Jao3 mbr-parallax-background" id="content5-k">
        <div class="container">
            <div class="media-container-row">
                <div class="title col-12 col-md-8">
                    <h2 class="align-center mbr-bold mbr-white pb-3 mbr-fonts-style display-1">Recuperación de contraseñas&nbsp;</h2>
                </div>
            </div>
        </div>
    </section>

  <section class="mbr-section content5 mbr-parallax-background" id="content5-k">
    <div class="container">
        <h2>Escriba correctamente todos los datos o será baneado de por vida >:D</h2>
        <form action="ReactivateAccount.php" method="POST">
        <input type="hidden" name="form" value="reactivate">
          <div class="form-group">
            <label for="pwd">Nombre de usuario:</label>
            <input type="text" class="form-control" id="username" placeholder="Nombre de usuario" name="username">
          </div>
          <div class="form-group">
            <label for="email">Correo electronico:</label>
            <input type="email" class="form-control" id="email" placeholder="Correo electronico" name="email">
          </div>
          <div class="form-group">
            <label for="pwd">Contraseña:</label>
            <input type="password" class="form-control" id="password" placeholder="Contraseña" name="password">
          </div>
          <button type="submit" class="btn btn-warning">Enviar</button>
        </form>
    </div>
  </section>

  <?php
    include 'footer.html';
  ?>

</body>

</html>