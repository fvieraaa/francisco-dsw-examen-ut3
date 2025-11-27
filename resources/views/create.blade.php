<!-- Francisco Viera Hernandez -->
<!DOCTYPE html>
<html>
<head>
</head>
<body>

<h1> formulario de alta </h1>
<!-- Aquí le estamos poniendo para que se imprima los errores que pille el controler al mandar al cuestionario  -->
@if ($errors->any())
    <div style="color:red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<!-- Aquí ponemos esto para mandar el status, es decir el mensaje con las unidades -->
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<!-- aqui hacemos el formulario, y se envia a travez de post y se cifra con el csrf-->
<form action="{{ route('store') }}" method="POST">
    @csrf

    <label>Nombre producto:</label><br>
    <input type="text" name="nombre-producto""><br><br>

    <label>Descripción:</label><br>
    <textarea name="descripcion-producto"></textarea><br><br>


    <label>Precio:</label><br>
    <input type="number" name="precio"><br><br>

    <label>Unidades:</label><br>
    <input type="number" name="unidades"><br><br>


    <label>categoria del producto:</label><br>
    <select name="categoria-producto">
        <option value="Electrónica">Electrónica</option>
        <option value="Deporte">Deporte</option>
    </select><br><br>
    <button type="submit">Guardar Producto</button>
</form>

</body>
</html>