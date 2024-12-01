<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>@yield('tituloPagina')</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">




  <style>
    /* Caracteristicas */
    .features-container {
      display: flex;
      justify-content: space-around;
      align-items: center;
      padding: 20px 0;
      background-color: #ffffff;
    }

    .feature {
      text-align: center;
      max-width: 150px;
      color: #000000;
    }

    .feature i {
      font-size: 40px;
      color: #d81c1c;
      /* Rojo */
      margin-bottom: 10px;
    }

    .feature h3 {
      font-size: 16px;
      color: #d81c1c;
      font-weight: bold;
      margin-bottom: 5px;
    }

    .feature p {
      font-size: 14px;
      color: #333333;
      line-height: 1.5;
    }

    .feature a {
      color: #000000;
      text-decoration: underline;
    }


    /* Pie de pagina */

    .footer {
      background-color: black;
      color: #fff;
      padding: 40px 10px;
      font-family: Arial, sans-serif;
      text-align: center;
    }


    .footer-container {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
      justify-content: center;

    }



    .footer-section {
      flex: 1 1 20%;
      min-width: 200px;
    }



    .footer-section h4 {
      font-size: 1.1em;
      margin-bottom: 15px;
    }



    .footer-section p,
    .footer-section ul {
      font-size: 0.9em;
      line-height: 1.6;

    }



    .footer-section ul {
      list-style: none;
      padding: 0;

    }



    .footer-section ul li {
      margin-bottom: 8px;
    }



    .footer-section a {
      color: #fff;
      text-decoration: none;
    }



    .footer-section a:hover {
      text-decoration: underline;
    }



    .footer-bottom {
      display: flex;
      justify-content: center;
      align-items: center;
      border-top: 1px solid rgba(255, 255, 255, 0.3);
      text-align: center;
      padding-top: 20px;
      margin-top: 20px;
    }



    .social-icons,
    .payment-methods {
      display: flex;
      margin: 10px 0;

      align-items: center;
      padding-left: 40px;
    }



    .social-icons a {
      color: #fff;
      margin: 8px;
      text-decoration: none;
      font-size: 1.8em;
    }



    .payment-methods img {
      max-height: 38px;
      /* width:200px;*/
      padding-left: 10px;
    }



    .footer-text p {
      max-height: 60px;
      margin: 1px;
    }
  </style>


</head>

<body>

  <div class="features-container">
    <div class="feature">
      <i class="bi bi-lock"></i>
      <h3>Compra fácil y seguro</h3>
      <p>En solo 6 simples pasos, <a href="#">ve nuestro video</a></p>
    </div>
    <div class="feature">
      <i class="bi bi-bag-check"></i>
      <h3>Cambios y devoluciones</h3>
      <p>En nuestras unica tinda pero aun no esta asi que esperen xde</p>
    </div>
    <div class="feature">
      <i class="bi bi-shop"></i>
      <h3>Retiro en tienda</h3>
      <p>Compra online y retira en tienda pero si le roban no es nuestra culpa xd. <a href="#">Ver tiendas</a></p>
    </div>
    <div class="feature">
      <i class="bi bi-truck"></i>
      <h3>Sigue tu pedido</h3>
      <p>Fácil y rápido solo con tu DNI. <a href="#">Seguir pedido</a></p>
    </div>
    <div class="feature">
      <i class="bi bi-credit-card"></i>
      <h3>Hasta 36 cuotas</h3>
      <p>Pagando con tu tarjeta Oh! <a href="#">Solicítala</a></p>
    </div>
    <div class="feature">
      <i class="bi bi-chat-dots"></i>
      <h3>Chatea con nosotros</h3>
      <p>Escríbenos a nuestro <a href="#">Facebook Chat</a></p>
    </div>
  </div>



  <!-- Pie de pagina-->
  <footer class="footer">
    <div class="footer-container">

      <!-- Contáctanos -->
      <div class="footer-section">

        <h4>Contáctanos</h4>
        <p><i class="bi bi-chat-dots"></i> <strong>Chatea con nosotros</strong><br>Te atendemos las 24 horas</p>
        <p><i class="bi bi-envelope"></i> <strong>Escríbenos</strong><br>Estamos para ayudarte <a href="mailto:sac-online@oechsle.pe">sac-online@oechsle.pe</a></p>
        <p><i class="bi bi-telephone"></i> <strong>Llámanos al (01) 619-4801</strong><br>De lunes a domingo de 8:00 am a 8:00 pm</p>
        <p><i class="bi bi-geo-alt"></i> <strong>Visítanos</strong><br>Revisa aquí nuestras tiendas disponibles a nivel nacional XD<br><a href="#">Ver tiendas</a></p>
      </div>



      <!-- Secciones destacadas -->

      <div class="footer-section">
        <h4>Secciones destacadas</h4>
        <ul>
          <li><a href="#">¿Cómo comprar en DNJ?</a></li>
          <li><a href="#">Cambios y devoluciones</a></li>
          <li><a href="#">Despacho a Domicilio</a></li>
          <li><a href="#">Mis Pedidos</a></li>
          <li><a href="#">Devoluciones sin salir de casa</a></li>
          <li><a href="#">Super Garantía</a></li>
          <li><a href="#">Garantía Dechogar</a></li>
          <li><a href="#">Garantía en Electro y Máquinas de Deporte</a></li>
          <li><a href="#">Gestión de Residuos de Aparatos Eléctricos y Electrónicos (RAEE)</a></li>

        </ul>
      </div>



      <!-- Servicio al Cliente -->
      <div class="footer-section">
        <h4>Servicio al Cliente</h4>
        <ul>
          <li><a href="#">Términos y Condiciones Generales</a></li>
          <li><a href="#">Términos y Condiciones de Promociones Comerciales</a></li>
          <li><a href="#">Política de tratamiento de datos personales</a></li>
          <li><a href="#">Política de privacidad</a></li>
          <li><a href="#">Derechos ARCO</a></li>
          <li><a href="#">Comprobante electrónico</a></li>
          <li><a href="{{ route('reclamaciones.create') }}"><img src="{{ asset('img/libroreclamo.jpg') }}" alt="Descripción de la imagen" width="200" height="100"></a></li>
        </ul>

      </div>



      <!-- Sobre Oechsle -->

      <div class="footer-section">

        <h4>Sobre DNJ</h4>
        <ul>
          <li><a href="#">Nosotros</a></li>
          <li><a href="#">Nuestras tiendas</a></li>
          <li><a href="#">Trabaja con nosotros</a></li>
          <li><a href="#">Ventas institucionales</a></li>
          <li><a href="#">Vende con nosotros</a></li>
          <li><a href="#">Celulares</a></li>
          <li><a href="#">Laptops</a></li>
          <li><a href="#">Televisores</a></li>
        </ul>
      </div>
    </div>



    <!-- Footer Bottom -->

    <div class="footer-bottom mb-4 ">
      <div class="social-icons">
        <H4>Síguenos en : </H4>
        <a href="#" class="social-icon"><i class="bi bi-youtube"></i></a>
        <a href="#" class="social-icon"><i class="bi bi-instagram"></i></a>
        <a href="#" class="social-icon"><i class="bi bi-facebook"></i></a>
      </div>

      <div class="payment-methods ">
        <H4>Medios de pago:</H4>
        <img src="{{ asset('img/pagos.png') }}" alt="Descripción de la imagen">
      </div>

    </div>
    <div class="footer-text ">
      <p>Tiendas Peruanas S.A. RUC N°1236547894 . Todos los derechos reservados.</p>
      <p>Precios disponibles solo en www.DNJ.pe Precios online publicados pueden incluir descuento adicional. Precios sujetos a variaciones sin previo aviso. Productos sujetos a disponibilidad de stock.</p>
    </div>

  </footer>


</body>

</html>