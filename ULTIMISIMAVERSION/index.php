<?php include 'back-end/Distancia.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Viaja ya</title>
    <link rel="stylesheet" href="style.css">
    
</head>
<body>

 <header class="header">
        <a href="index.php">
        <img class="logo"  src="Imagen/logo.png" alt="">
        </a> 
        <nav>
            
             <a class="registro" onclick="registrarse();">Registrarse</a>
             <a class="login-usuario" onclick="iniciarsesion();">Iniciar Sesión</a>        
        </nav>
 </header>
 
 <!-- Seccion donde se encuentra el form principal -->
 <section class="principal">
    <div class="divprincipal">
        <div class="div1">
            <h1 class="titulo">Reserva tu pasaje</h1>
        </div>
        <!--Formulario php para consulta de pasajes  -->
        
        <div class="div2">
            <div class="formulario">
                
                   <form action="index.php"" method="post">
                    Busca tu pasaje <br>
                    <div class="radios">
                     <input type="radio" id="ida" name="tipodeviaje" value="IDA">
                     <label for="ida">Ida</label><br>
                     <input type="radio" id="idayvuelta" name="tipodeviaje" value="IDA">
                     <label for="idayvuelta">Ida y Vuelta</label><br>
                    </div>
                  
                  
 
                    <label for="origen">Origen:</label>
                    <select name="origen" id="origen" onchange="cargarDestinosPorRamal()">
                    <?php
                    if (empty($origenes)) {
                    echo '<option value="" disabled>No hay datos disponibles</option>';
                    } else {
                    foreach ($origenes as $origen) {
                    echo '<option value="' . $origen['desde'] . '" data-ramal="' . $origen['ramal'] . '">' . $origen['desde'] . '</option>';
                    }
                    }
                    ?>
                    </select>
                    <br>
                    <label for="destino">Destino:</label>
                    <select name="destino" id="destino-ramal">
                    </select>
                    <br>
                   
                <script>
                    function cargarDestinosPorRamal() {
                    var origenSelect = document.getElementById("origen");
                    var destinoRamalSelect = document.getElementById("destino-ramal");
                    var selectedRamal = origenSelect.options[origenSelect.selectedIndex].getAttribute("data-ramal");
                    destinoRamalSelect.innerHTML = '<option value="" disabled selected>Selecciona un destino</option>';

                    <?php
                    foreach ($destinos as $destino) {
                    echo 'if ("' . $destino['ramal'] . '" === selectedRamal && "' . $destino['hasta'] . '" !== origenSelect.value) {';
                    echo 'destinoRamalSelect.innerHTML += \'<option value="' . $destino['hasta'] . '">' . $destino['hasta'] . '</option>\';';
                    echo '}';
                    }
                    ?>
                    }
                 </script>

                    <br>
                    <label for="fechaida">Fecha de Ida:</label>
                    <input type="date" id="fechaida" name="fechaida"><br>
                    <br>
                    <label for="fechavuelta">Fecha de Vuelta:</label>
                    <input type="date" id="fechavuelta" name="fechavuelta"><br>
                    <br>
                    <label for="cantidad">Pasajeros (Max 10):</label>
                    <input type="number" id="cantidad" name="cantidad" min="1" max="10"><br>
                    <br>
                    <input type="submit" value="Consultar" onclick="solicitarConsulta();" name="btn_consulta" >
                    
                   
                </form>
            </div>
            <!-- <div>
                <p>Reserva ahoraa</p>
                <input type="submit" action="Views/formReservas.php" value="Ir a reservas" name="botonReservar" >
            </div> -->
        </div>
    </div>
    
 </section>

<section class="login">
    <div class="popup">
        <div class="close-btn">
           <a onclick="cerrar();">&times;</a> 
        </div>
        <form class="formlogin" action="back-end/registro.php" method="post">
        Usuario:<input type="text" name="user" placeholder="Usuario" required><br>        
        <br>
        Contraseña:<input type="text" name="pass" placeholder="Contraseña"required><br>
        <br>
        Nombre: <input type="text" name="name" placeholder="Ingrese su nombre"required><br>
        <br>
        E-mail: <input type="text" name="mail" placeholder="Ingrese su email"required><br>
        <br>  
        <input type="submit" name="Registrar" value="Registrar" class="center">
        </form>      
    </div>      
</section>
<section class="login-user">
    <div class="popup1">
        <div class="close-btn1">
           <a onclick="cerrar1();">&times;</a> 
        </div>
        <form class="formlogin" action="back-end/login.php" method="post">
        Usuario: <input type="text" name="users" placeholder="Ingrese su usuario"required><br>
        <br>
        Contraseña:<input type="text" name="passw" placeholder="Contraseña"required><br>
        <br>
        <input type="submit" name="Ingresar" value="Ingresar" class="center">
        </form>      
    </div>      
</section>


 <section>
    <!-- Seccion de imagenes de promocion -->
    <div class="imagenes">
      <div class="listaimg">
        <div class="carousel-1" id="carousel-1">
            
            <img src="Imagen/Buenos Aires.png" alt="" onclick="window.location.href='buenosaires.php';">
>
        </div>
        <div class="carousel-2" id="carousel-2">       
            <img src="Imagen/Córdoba.png" alt="" onclick="window.location.href='cordoba.php';">
        </div>
        <div class="carousel-3" id="carousel-3">
            <img src="Imagen/Mar del plata.png" alt="" onclick="window.location.href='mardelplata.php';">
      </div>
    </div> 
 </section> 
 <section>
    <!-- Seccion de informacion -->
   <div class="seccion3">
    <div>
        <i class="fa-regular fa-circle-question"></i>
    
        <a  class="faqp" onclick="window.location.href='FAQ.php';">Preguntas Frecuentes</a><br>
        <br>
    </div>
  
  </div>

  

 </section>

 <footer>
    <div class="piepag">
      <h3 class="corpo"> Viaja Ya &copy; 2023 - Todos los derechos reservados   </h3>
    </div>
 </footer>  
 <script>
    function registrarse(){
        document.querySelector(".popup").classList.add("active");
  
        
    }
    function cerrar(){
        document.querySelector(".popup").classList.remove("active");
        
    }

    function iniciarsesion(){
        document.querySelector(".popup1").classList.add("active1");
        
    }
    function cerrar1(){
        document.querySelector(".popup1").classList.remove("active1");
      
    }
    function solicitarConsulta() {
     var usuario = alert("Por favor, inicia sesión para realizar la consulta!");
    }
   
    
 </script>
 <script src="https://kit.fontawesome.com/7b140c6d77.js" crossorigin="anonymous"></script>
 
</body>
</html>
