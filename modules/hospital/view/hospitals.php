<!--<script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=true"></script>-->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDXG-kyMZPsgJmupZX8n7wcF4XVwBU2rjI" async defer></script>
<script src="<?php echo HOSPITALS_JS_PATH ?>geolocator.js"></script>

<section id="main" class="wrapper">
    <div class="container">

        <header class="major">
            <h2>Hospitales</h2>
            <p>Aquí puedes ver los Hospitales disponibles en tu zona</p>
        </header>

        <div class="image fit">
            <div id='ubicacion'></div>
            <!-- Se escribe un mapa con la localizacion anterior-->
            <div id="demo"></div>
            <div id="mapholder"></div>
            <div class="hospitals"></div>
        </div>

    </div>
</section>
