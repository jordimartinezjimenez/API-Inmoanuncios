<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inmoanuncios contacto</title>
</head>
<body>
    <h1>{{ $details ['title'] }}</h1>
    <p>{{ $details ['body'] }}</p>
    <h2>Contacte con él:</h2>
    <p>Email: {{ $details ['email'] }}<br>
        Telefono: {{ $details ['telefono'] }}
    </p>
    <div>
        <h2>Anuncio:</h2>
        <span>Referencia: {{ $details ['referencia'] }}</span><br>
        <span>{{ $details ['tipo'] }} en {{ $details ['trato'] }}</span><br>
        <span>{{ $details ['municipio'] }}, {{ $details ['provincia'] }}</span><br>
        <span>{{ $details ['precio'] }}€</span><br>
        <a href="{{ $details ['url'] }}">
            <img style="max-width: 300px; max-height: 225px; object-fit: cover;" src="{{ $details ['imagen'] }}" alt="">
        </a><br>
        <a href="{{ $details ['url'] }}">Click para ir al anuncio</a>
    </div>
    <hr>
    <div style="display: flex; align-items: center;">
        <img style="width: 50px; height: 50px;" src="https://i.imgur.com/pUIkY3g.png"> 
        <span>Copyright ©2000 - 2022</span>
    </div>
</body>
</html>