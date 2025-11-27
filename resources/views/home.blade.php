<!-- Francisco Viera Hernandez -->

<!DOCTYPE html>
<html>
<head>
    <title>Producto guardado</title>
</head>
<body>

<h1>Bienvenido a la Gestión de Productos</h1>
<!-- Aqui tenemos el mensaje que nos pide, una imagen y por ultimo un texto con una ruta hacia el formulario -->
<p>Esta aplicación permite gestionar el inventario de nuestra tienda de forma eficiente y 
rápida.</p>
<img src="{{ asset('img/logo.png') }}" alt="Logo" >
<br>
<a href="{{ route('create') }}">Ir al formulario</a>

</body>
</html>