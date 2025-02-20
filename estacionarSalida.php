<!doctype html>
<html lang="en">
  <head>
  

  <script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
  <script type="text/javascript" src="js/jquery.autocomplete.min.js"></script>
  <script type="text/javascript" src="js/funcionAutoCompletar.js"></script>



    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.80.0">
    <!--title>Signin Template · Bootstrap v4.6</title-->
    <?php
      include_once "titulo.php";
    ?>


    <link rel="canonical" href="https://getbootstrap.com/docs/4.6/examples/sign-in/">
    <!-- Bootstrap core CSS -->
    <!--link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet"   CODIGO ABSOLUTO... NO NO SIRVE!!!--> 

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="archivoscss/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    <?php
      include "ClaseEstacionamiento.php";
      $listado=estacionamiento::leer("estacionados");
      include_once "tablaestacionados.php";
    ?>    
   
    <form class="form-signin" action="estacionarSalidaHacer.php" method="POST">
      <img class="mb-4" src="https://uxwing.com/wp-content/themes/uxwing/download/07-design-and-development/bootstrap-4.png" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Salida de Vehiculo</h1>
      <p>usuario conectado : <?php echo $_COOKIE["usuario"]?></p>    
      <label for="inputEmail" class="sr-only">Ingrese Nro. de patente</label>
      <label>Ingrese Nro. de patente</label>
      <br>
      <input type="text" name="patente" title="formato de patente: AAA666" class="form-control" placeholder="Patente" required autofocus id="autocomplete" />

      <br>
      
      <?php 
        include "generarAutocompletar.php";
      ?>
      <br>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Salida de patente</button>


      <p class="mt-5 mb-3 text-muted">&copy; 2021</p>
    </form>
  </body>
</html>
