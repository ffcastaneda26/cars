<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <!--<meta name=description content="This site was generated with Anima. www.animaapp.com"/>-->
    <!-- <link rel="shortcut icon" type=image/png href="https://animaproject.s3.amazonaws.com/home/favicon.png" /> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <link rel="shortcut icon" type="image/png" href="https://animaproject.s3.amazonaws.com/home/favicon.png" />
    <meta name="og:type" content="website" />
    <meta name="twitter:card" content="photo" />
    <link rel="stylesheet" type="text/css" href="css/create-account.css" />
    <link rel="stylesheet" type="text/css" href="css/styleguide.css" />
    <link rel="stylesheet" type="text/css" href="css/globals.css" />


    <link rel="stylesheet" href="{{ asset('figma/anima-create-account/css/create-account.css') }}">
    <link rel="stylesheet" href="{{ asset('figma/anima-create-account/css/styleguide.css') }}">
    <link rel="stylesheet" href="{{ asset('figma/css/globals.css') }}">

  </head>
  <body style="margin: 0; background: #ffffff">
    <input type="hidden" id="anPageName" name="page" value="create-account" />
    <div class="container-center-horizontal">
      <div class="create-account screen">
        <div class="flex-row inter-normal-black-12px">

          <img class="img_logo-cuervo" src="{{ asset('figma/anima-create-account/img/img-logocuervo-1@2x.png') }}" alt="img_logoCuervo" />
          <div class="label_-login"><span class="inter-normal-black-12px">Login</span></div>
          <div class="lable_language"><span class="inter-normal-black-12px">En</span></div>
        </div>
 
        <img class="img_linedivider" src="{{ asset('figma/anima-create-account/img/img-linedivider-1@2x.png') }}" alt="img_linedivider" />

        <div class="overlap-group">
          <div class="label_-crear-cuenta"><span>Crear Cuenta</span></div>
          <div class="label_-container inter-light-masala-10px">
            <div class="label"><span class="inter-light-masala-10px">Nombre</span></div>
            <div class="label"><span class="inter-light-masala-10px">Apellido</span></div>
          </div>
          <div class="txt_-container">
   
            <img class="txt_nombre" src="{{ asset('figma/anima-create-account/img/txt-nombre-1@2x.png') }}" alt="txt_nombre" />
            <img class="txt_apellido" src="{{ asset('figma/anima-create-account/img/txt-apellido-1@2x.png') }}" alt="txt_apellido" />
            
          </div>
          <div class="label_-telfono inter-light-masala-10px">
            <span class="inter-light-masala-10px">Teléfono</span>
          </div>
          <div class="txt"></div>
          <div class="label_-email inter-light-masala-10px"><span class="inter-light-masala-10px">Email</span></div>
          <div class="txt"></div>
          <div class="label_-contrasea inter-light-black-10px">
            <span class="inter-light-black-10px">Contraseña</span>
          </div>
          <div class="txt_password"></div>
          <div class="label_-confirmar-contrasea inter-light-black-10px">
            <span class="inter-light-black-10px">Confirmar Contraseña</span>
          </div>
          <div class="txt_confirm-password"></div>
          <div class="overlap-group1">
            <div class="btn_-crear-cuenta"><span>Crear Cuenta</span></div>
          </div>
          <p class="label_-ya-tienes-cuenta inter-light-hurricane-10px">
            <span class="inter-light-hurricane-10px">¿Ya tienes una cuenta </span><span class="span1">Cuervo</span
            ><span class="inter-light-hurricane-10px">? </span><span class="span3">Login</span>
          </p>
        </div>
      </div>
    </div>
  </body>
</html>
