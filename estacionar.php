<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.80.0">
    <!--title>Pricing example · Bootstrap v4.6</title-->
    <title>Estacionar</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/4.6/examples/pricing/">

    

    <!-- Bootstrap core CSS -->
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
    <link href="pricing.css" rel="stylesheet">

  </head>



  <body>
    
<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
  <h5 class="my-0 mr-md-auto font-weight-normal">Nombre de la Empresa</h5>
  
  <!--nav class="my-2 my-md-0 mr-md-3">
    <a class="p-2 text-dark" href="#">Features</a>
    <a class="p-2 text-dark" href="#">Enterprise</a>
    <a class="p-2 text-dark" href="#">Support</a>
    <a class="p-2 text-dark" href="#">Pricing</a>
  </nav-->

  <a class="btn btn-outline-primary" href="#">Volver</a>
</div>

<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
  <h1 class="display-4">ESTACIONAR</h1>
  <p class="lead">Ingreso y Egreso de vehiculos al estacionamiento</p>
    <h1 id="HoraActual">00:00:00
		<script>
		    function myFunc()  {
		        var ahora = new Date();
		        var hora = ahora.getHours();
		        var minutos = ahora.getMinutes() ;
		        var segundos = ahora.getSeconds();
		        
		        if (hora<10) {hora = "0" + hora;}
		        if (minutos<10){ minutos = "0" + minutos;}
		        if (segundos<10){segundos = "0"+ segundos;}
		        
		        document.getElementById('HoraActual').innerHTML = hora + ":" + minutos + ":" + segundos;
		       
		    }
		    setInterval(myFunc, 1000);
		</script>
	</h1>
</div>

<div class="container">
  <div class="card-deck mb-3 text-center">

    <div class="card mb-4 shadow-sm">
      <div class="card-header">
        <h4 class="my-0 font-weight-normal">Ingreso de Vehiculos</h4>
      </div>
      <div class="card-body">
        <h1 class="card-title pricing-card-title">$2,00 <small class="text-muted">/ Minuto</small></h1>
        <ul class="list-unstyled mt-3 mb-4">
          <li>$  50,00 x Media Hora </li>
          <li>$ 100,00 x Hora</li>
          <li>$1100,00 x 12 horas</li>
          <li>$2000,00 x Día</li>
        </ul>
        <!--button type="button" class="btn btn-lg btn-block btn-primary">Entrada de la Patente</button-->
        <p><a class="btn btn-lg btn-block btn-primary" href="estacionarEntrada.php" role="button">Entrada de la Patente</a></p>
      </div>
    </div>

    <div class="card mb-4 shadow-sm">
      <div class="card-header">
        <h4 class="my-0 font-weight-normal">Salida de Vehiculos</h4>
      </div>
      <div class="card-body">
        <h1 class="card-title pricing-card-title">$2,00 <small class="text-muted">/ Minuto</small></h1>
        <ul class="list-unstyled mt-3 mb-4">
          <li>$  50,00 x Media Hora </li>
          <li>$ 100,00 x Hora</li>
          <li>$1100,00 x 12 horas</li>
          <li>$2000,00 x Día</li>
        </ul>
        <!--button type="button" class="btn btn-lg btn-block btn-primary">Salida de la Patente</button-->
        <p><a class="btn btn-lg btn-block btn-primary" href="estacionarSalida.php" role="button">Salida de la Patente</a></p>
      </div>
    </div>

  </div>

  <footer class="pt-4 my-md-5 pt-md-5 border-top">
    <div class="row">
      <div class="col-12 col-md">
        <!--img class="mb-2" src="../assets/brand/bootstrap-solid.svg" alt="" width="24" height="24"-->
        <img class="mb-2" src="https://uxwing.com/wp-content/themes/uxwing/download/07-design-and-development/bootstrap-4.png" alt="" width="24" height="24">
        <small class="d-block mb-3 text-muted">&copy; 2021</small>
      </div>
      <!--div class="col-6 col-md">
        <h5>Características</h5>
        <ul class="list-unstyled text-small">
          <li><a class="text-muted" href="#">Cosas interesantes</a></li>
          <li><a class="text-muted" href="#">Característica aleatoria</a></li>
          <li><a class="text-muted" href="#">Característica de equipo</a></li>
          <li><a class="text-muted" href="#">Cosas para desarrolladores</a></li>
          <li><a class="text-muted" href="#">Otro</a></li>
          <li><a class="text-muted" href="#">Ultima vez</a></li>
        </ul>
      </div>
      <div class="col-6 col-md">
        <h5>Recursos</h5>
        <ul class="list-unstyled text-small">
          <li><a class="text-muted" href="#">Recurso</a></li>
          <li><a class="text-muted" href="#">Nombre del Recurso</a></li>
          <li><a class="text-muted" href="#">Otro recurso</a></li>
          <li><a class="text-muted" href="#">Recurso final</a></li>
        </ul>
      </div>
      <div class="col-6 col-md">
        <h5>Acerca de</h5>
        <ul class="list-unstyled text-small">
          <li><a class="text-muted" href="#">Equipo</a></li>
          <li><a class="text-muted" href="#">Ubicaciones</a></li>
          <li><a class="text-muted" href="#">Intimidad</a></li>
          <li><a class="text-muted" href="#">Condiciones</a></li>
        </ul>
      </div-->
    </div>
  </footer>
</div>


    
  </body>
</html>
