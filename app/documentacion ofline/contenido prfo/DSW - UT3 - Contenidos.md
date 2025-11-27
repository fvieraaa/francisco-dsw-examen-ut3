# Introducción a Laravel

# DSW \- UT3 \- Contenidos

## **Introducción a Laravel**

---

### **Objetivos de este bloque**

* Comprender qué es Laravel y por qué se utiliza.  
* Conocer el concepto de framework.  
* Instalar y crear el primer proyecto Laravel.  
* Explorar la estructura básica de un proyecto Laravel.  
* Realizar las primeras pruebas accediendo a rutas y vistas sencillas.

---

## **¿Qué es Laravel? Instalación y primer proyecto**

---

### **¿Qué es un framework?**

Un **framework** es un conjunto de herramientas y convenciones que nos ayudan a desarrollar software de forma más estructurada, rápida y segura.

En lugar de “empezar desde cero”, un framework te ofrece una base sobre la que construir.

Laravel es un framework **PHP** orientado al desarrollo de aplicaciones web. Es **gratuito, de código abierto y muy popular**, especialmente en entornos educativos y profesionales.

---

### **¿Por qué usar Laravel?**

Laravel ofrece muchas ventajas:

* ✔️ Usa el patrón **MVC (Modelo-Vista-Controlador)**, que separa la lógica de negocio del diseño.

* ✔️ Tiene una **sintaxis elegante y expresiva**, más fácil de leer.

* ✔️ Integra herramientas modernas como:

  * **Eloquent ORM** (para trabajar con bases de datos)

  * **Blade** (motor de plantillas)

  * **Artisan** (interfaz por consola)

* ✔️ Facilita tareas comunes: validación, autenticación, migraciones, sesiones, rutas…

---

### **Requisitos para usar Laravel**

Para trabajar con Laravel necesitas tener instalado:

* **PHP 8.1 o superior**

* **Composer** (gestor de dependencias de PHP)

* **Un servidor web** (puede ser local: Laravel incluye uno por defecto)

* **Editor de código recomendado:** Visual Studio Code

---

### **¿Qué es Composer y por qué necesitamos instalarlo?**

**Composer** es una herramienta de gestión de dependencias para el lenguaje **PHP**. Su función principal es **instalar automáticamente las librerías y herramientas que necesita tu aplicación para funcionar correctamente**.

Laravel, como muchos frameworks modernos, **no incluye todo su código dentro de una única carpeta**, sino que **depende de múltiples paquetes y librerías externas** que aportan funcionalidades como el manejo de rutas, la autenticación de usuarios, el acceso a bases de datos, etc.

Estas librerías no vienen incluidas por defecto, sino que se **descargan automáticamente** cuando instalamos Laravel mediante Composer.

---

#### **¿Qué hace exactamente Composer?**

Cuando descargamos o creamos un nuevo proyecto con Laravel usando Composer, la herramienta:

1. **Lee un archivo llamado composer.json** que define qué dependencias necesita el proyecto (por ejemplo, Laravel, PHPUnit, etc.).

2. **Descarga esas dependencias** desde un repositorio central llamado [Packagist](https://packagist.org/).

3. **Crea una carpeta llamada vendor/** donde guarda todas las librerías externas.

4. **Genera un archivo composer.lock** que asegura que todos los desarrolladores del equipo trabajen exactamente con las mismas versiones de los paquetes.

#### **¿Por qué necesitamos Composer para Laravel?**

Laravel no puede funcionar sin Composer porque:

* Laravel está dividido en múltiples componentes que **se instalan mediante Composer**.

* Muchas funcionalidades importantes como **la autenticación, el sistema de colas o el manejo de base de datos** están empaquetadas como dependencias externas.

* Laravel se actualiza frecuentemente, y Composer nos permite **mantener nuestras librerías actualizadas** fácilmente.

#### **¿Cómo se instala Composer?**

Composer se puede instalar fácilmente desde su sitio web oficial:

* Página oficial: [https://getcomposer.org](https://getcomposer.org)  
* Si estás usando **Laragon** o **XAMPP con Laravel**, probablemente ya tengas Composer instalado.  
* Para comprobar si Composer está instalado, puedes abrir una terminal y escribir:

```
composer --version
```

Si ves algo como Composer version 2.x.x, ya lo tienes instalado.

---

### **Instalación de Laravel paso a paso**

#### **Paso 1: Instalar Composer**

Desde [https://getcomposer.org/](https://getcomposer.org/), sigue las instrucciones para tu sistema operativo.

#### **Paso 2: Instalar Laravel**

Puedes instalar Laravel de la siguiente manera:

```
composer create-project laravel/laravel nombredelproyecto
```

#### **Paso 3: Iniciar el servidor local**

```
cd nombredelproyecto
php artisan serve
```

Laravel arrancará el servidor local y te indicará la URL (por defecto [http://127.0.0.1:8000](http://127.0.0.1:8000)). Si quiero que el servidor local escuche peticiones de cualquier máquina, debo arrancarlo con el siguiente comando:

```
php artisan serve --host=0.0.0.0
```

---

### **Tu primer proyecto Laravel**

Al acceder a la URL del servidor local, verás la **página de bienvenida** de Laravel.

Esta página se genera con una vista llamada welcome.blade.php, que puedes encontrar en resources/views.  
---

### **Estructura básica de un proyecto Laravel**

* **routes/web.php** → Aquí se definen las rutas (URLs) de tu aplicación.  
* **resources/views/** → Aquí están las vistas (HTML con Blade).  
* **app/Http/Controllers/** → Aquí irán los controladores (la lógica).  
* **public/** → Carpeta pública. Aquí está index.php, el punto de entrada.  
* **artisan** → Comando interno de Laravel para generar código, migrar BD, lanzar servidor, etc.

---

## **Primeros pasos con rutas y vistas Blade**

---

### **¿Qué son las rutas?**

Las rutas permiten **vincular una URL con una acción**, como devolver una vista o ejecutar lógica.

Se definen en el archivo routes/web.php.

```
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
```

En este ejemplo, al acceder a /, Laravel carga la vista resources/views/welcome.blade.php.  
---

### **Crear tu primera ruta personalizada**

```
Route::get('/hola', function () {
    return '¡Hola, mundo!';
});
```

---

### **Devolver una vista Blade personalizada**

1. Crea un archivo en resources/views llamado inicio.blade.php:

```
<!DOCTYPE html>
<html>
<head>
    <title>Mi primera vista</title>
</head>
<body>
    <h1>Bienvenido a mi primera aplicación Laravel</h1>
</body>
</html>
```

2. Crea una ruta que la muestre:

```
Route::get('/inicio', function () {
    return view('inicio');
});
```

---

### **¿Qué es Blade?**

**Blade** es el **motor de plantillas de Laravel**. Te permite:

* Usar **variables PHP** dentro del HTML con {{ $variable }}  
* Usar **estructuras de control** (if, foreach, etc.) con una sintaxis sencilla  
* Crear **plantillas base** para reutilizar código

---

### **Ejemplo de Blade con variables y estructuras**

```
Route::get('/saludo', function () {
    $nombre = 'Sergio';
    return view('saludo', ['nombre' => $nombre]);
});
```

Archivo resources/views/saludo.blade.php:

```
<h1>Hola, {{ $nombre }}!</h1>
```

---

### **Estructura condicional y bucles en Blade**

```
@if($nombre == 'Sergio')
    <p>¡Hola, profe!</p>
@else
    <p>Hola, {{ $nombre }}</p>
@endif
```

```
@foreach($alumnos as $alumno)
    <li>{{ $alumno }}</li>
@endforeach
```

---

## **Tareas recomendadas para practicar**

* Crear dos rutas nuevas que devuelvan diferentes vistas.  
* Usar una vista Blade que reciba variables y las muestre.  
* Crear un array con nombres y mostrarlos con @foreach.

---

## **📎 Anexos útiles**

* [Documentación oficial de Laravel](https://laravel.com/docs)  
* [Composer](https://getcomposer.org/)  
* [Blade – motor de plantillas](https://laravel.com/docs/blade)

# Rutas

# **Rutas**

Laravel routing es un mecanismo usado para enrutar todas las peticiones que llegan a nuestrea aplicación a métodos o funciones específicas que las tratarán convenientemente. Las rutas de Laravel aceptan una URI y un *closure*. Los *closure* son una versión de PHP de lo que sería una función anónima. Un *closure* es una función que puedes pasar como un objeto, asignar a una variable, o pasar como un parámetro a otra función o método.

Las rutas Laravel se definen en los *route files* localizados en la carpeta *routes*.

* El fichero *routes/web.php* define rutas a la interfaz web de la aplicación.  
* El fichero *routes/api.php* define rutas a tu API (si dispones de una). Se utilizan en arquitecturas orientadas a servicio o REST APIs.

El contenido por defecto de *routes/web.php* es el siguiente:

Copiar

```

Route::get('/', function () {
   return view('welcome');
});
```

Lo cual indica que cuando se acceda a la URL raíz de nuestra aplicación, se mostrará la vista *resources/views/welcome.blade.php*. 

[*view()*](https://laravel.com/docs/9.x/helpers#method-view) es un helper que devuelve una instancia de una vista.

A continuación se muestran otras formas de definir rutas en Laravel:

Copiar

```

Route::get('/', function () {

   $viewData = [];

   $viewData["title"] = "Página principal - Tienda online";

   return view('home.index')->with("viewData", $viewData);

});
Route::get('/contacto', function () {

   $dato1 = "texto1";

   $dato2 = "texto2";

   return view('home.contacto')

       ->with("dato1", $dato1)

       ->with("dato2", $dato2);

});



Route::get('/about', 'App\Http\Controllers\HomeController@about')->name("home.about");
```

* La primera conecta la URI "/" con una *closure* que devuelve una vista (home.index). Además, se le pasa la variable *viewData* a la vista *home.index* mediante el encadenamiento del [método *with*](https://laravel.com/docs/10.x/views#passing-data-to-views)  
* La última ruta conecta la URL "/about" con el método *about* de la clase *HomeController*, alojado en la carpeta /App/Http/Controllers". Además, [definimos un nombre personalizado de ruta](https://laravel.com/docs/10.x/routing#named-routes) mediante el encadenamiento del método *name* en la definición de la ruta.

También podemos utilizar la siguiente sintaxis para relacionar URI y controlador:

Route::get('/user', \[UserController::class, 'index'\]);

Las rutas también pueden incluir parámetros:

Copiar

```

Route::get('/cliente/{id}', 'App\Http\Controllers\CustomerController@show');
```

Esta ruta será la encargada de gestionar peticiones del tipo "/cliente/1", por ejemplo. En este caso, al método "ver" de "CustomerController" se le enviará por parámetro el campo "$id". Su declaración deberá realizarse de la siguiente forma:

Copiar

```

...

public function show($id) {

...
```

A través del comando php artisan route:list puedo consultar todas las rutas creadas en nuestra aplicación.

### **Rutas GET**

Son las rutas mostradas en el ejemplo anterior. Se utilizan para solicitar datos de un recurso específico. Por ejemplo, cuando un usuario accede a una página de nuestra aplicación, se realiza una petición GET. Estas rutas se definen con el método get y son las más comunes para cargar vistas o páginas.

### **Rutas POST**

Las rutas que utilizan el método POST se utilizan para enviar datos al servidor para crear un nuevo recurso. Por lo general, se utilizan en formularios cuando se envían datos al servidor, como la creación de un nuevo usuario o el envío de un formulario de contacto. Su formato sería el siguiente:

Copiar

```

Route::post('/test/store', 'App\Http\Controllers\TestController@store')->name("test.store");
```

En este caso, el método "store" deberá definirse con un parámetro de tipo Request: function store (Request $request). Dicho parámetro es un objeto que nos permitirá interactuar con la petición HTTP realizada por nuestra aplicación para acceder a las cookies, campos, ficheros, etc.

Nota: deberás incluir en el controlador la línea "use Illuminate\\Http\\Request;" para cargar la definición de la clase Request.

En el método "store" podremos establecer las reglas de validación de los campos recibidos. Podemos consultar información sobre las reglas de validación disponibles en [https://laravel.com/docs/10.x/validation\#available-validation-rules](https://laravel.com/docs/10.x/validation#available-validation-rules). A continuación mostramos un ejemplo de validación:

Copiar

```

$request->validate([  "name" => "required|max:255" ]);
```

Si la validación es exitosa el código se ejecutará correctamente. En caso contrario se generarán errores que se podrán consultar a través del objeto global "$errors". Si invocamos a $errors-\>all() podremos mostrar al usuario dichos errores.

Para crear nuevos registros a través del modelo deberemos crear un objeto de la clase del modelo correspondiente y asignarle valor a sus atributos. El valor que le debemos asignar lo obtenemos del objeto $request pasado por parámetro. Finalmente tendremos que invocar al método "save()" de dicho objeto para guardar los datos. Mostramos un ejemplo a continuación:

Copiar

```

$newCar= new Car();  

$newCar->setBrand($request->input('brand'));  

$newCar->save();
```

Más información sobre el método *input* en [https://laravel.com/docs/10.x/requests\#retrieving-input](https://laravel.com/docs/10.x/requests#retrieving-input)

Para validaciones más complejas podemos hacer uso de los Form requests. Pueden consultar la documentación oficial en la [siguiente página de la documentación oficial de Laravel](https://laravel.com/docs/10.x/validation#form-request-validation).

También pueden encontrar más información sobre la personalización de los mensajes de error en la [siguiente página de la documentación oficial de Laravel](https://laravel.com/docs/10.x/validation#customizing-the-error-messages).

### **Rutas DELETE**

Las rutas que usan el método DELETE de HTTP se utilizan para eliminar un recurso específico. Si tenemos un registro en nuestra base de datos que deseamos permitir que los usuarios eliminen, usaríamos una ruta DELETE para manejar esa solicitud. A continuación mostramos un ejemplo:

Copiar

```

Route::delete('/admin/products/{id}/delete', 'App\Http\Controllers\Admin\AdminProductController@delete')->name("admin.product.delete");
```

En este caso, la ruta tiene un parámetro ($id) que se corresponde con el identificador del registro que vamos a eliminar. Para que le llegue este parámetro a la ruta, el atributo "action" del formulario que enviará los datos debería incluir dicho parámetro. La sintaxis correcta sería la siguiente:

Copiar

```

<form action="\{\{ route('admin.product.delete', $product->getId())\}\}" method="POST">

   @method('DELETE')

   <button>

       Eliminar

   </button>

</form>
```

Hay que prestar atención al uso de la directiva [@method](https://laravel.com/docs/9.x/blade#method-field). Es necesario incluirla para indicar que la ruta utiliza el método DELETE.

### **Rutas PUT**

Las rutas PUT las utilizaremos para realizar modificaciones en nuestro modelo. A continuación incluimos un ejemplo de una ruta de este tipo.

Copiar

```

Route::put('/admin/products/{id}/update', 'App\Http\Controllers\Admin\AdminProductController@update')->name("admin.product.update");
```

En este caso el método "update" será el encargado de realizar la modificación correspondiente en el modelo.

Al igual que en el caso anterior, el formulario debe incluir la directiva [@method](https://laravel.com/docs/9.x/blade#method-field) para indicar que se va a utilizar el método PUT.

Copiar

```

<form action="\{\{ route('admin.product.update', ['id'=> $viewData['product']->getId()]) \}\}" method="POST">

   @method('PUT')

   ...

</form>
```

# Denominación de rutas

# **Denominación de rutas**

## **Convención para definir rutas personalizadas en Laravel**

En Laravel, las rutas son un componente esencial para dirigir las solicitudes de los usuarios a las acciones correspondientes en los controladores. Seguir una convención para denominarlas  garantizará que nuestras rutas sean claras, consistentes y alineadas con las mejores prácticas del framework.

A continuación, detallamos las convenciones que utilizaremos:  
---

## **Rutas para operaciones CRUD**

Cuando trabajemos con una entidad (como "posts", "users", o "products"), cada acción se asociará con un verbo HTTP, una URI y una acción en el controlador. Las rutas personalizadas deben definirse de la siguiente manera:

**Verbo HTTP**

**URI**

**Acción en el controlador**

**Descripción**

GET

/resources

index

Mostrar un listado de recursos

GET

/resources/create

create

Mostrar un formulario para crear un recurso

POST

/resources

store

Almacenar un nuevo recurso

GET

/resources/{id}

show

Mostrar un recurso específico

GET

/resources/{id}/edit

edit

Mostrar un formulario para editar un recurso

PUT/PATCH

/resources/{id}

update

Actualizar un recurso específico

DELETE

/resources/{id}

destroy

Eliminar un recurso específico  
---

## **Ejemplo: Definir rutas personalizadas para "posts"**

Supongamos que queremos gestionar un sistema de publicaciones (posts). Así deberíamos definir las rutas en el archivo routes/web.php:

Copiar

```

use App\Http\Controllers\PostController;



Route::get('/posts', [PostController::class, 'index'])->name('posts.index');       // Listar todos los posts

Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create'); // Formulario para crear un post

Route::post('/posts', [PostController::class, 'store'])->name('posts.store');     // Guardar un nuevo post

Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');   // Mostrar un post específico

Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit'); // Formulario para editar un post

Route::put('/posts/{id}', [PostController::class, 'update'])->name('posts.update'); // Actualizar un post específico

Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy'); // Eliminar un post
```

---

## **Detalles importantes**

* **Consistencia en los nombres de las rutas (name)**:  
  * Al definir las rutas, asignamos un nombre que sigue el formato recurso.acción (por ejemplo, posts.index, posts.create). Estos nombres permiten referirnos a las rutas dinámicamente en las vistas o controladores sin depender de la URI exacta.  
* **Uso de parámetros**:  
  * Cuando una ruta requiere identificar un recurso específico (como un post), utilizamos un parámetro en la URI. Por ejemplo, en la ruta /posts/{id}, {id} representa el identificador único del recurso.  
* **Buena práctica: generar URLs dinámicas**:  
  * En nuestras vistas Blade, siempre generaremos las URLs de manera dinámica utilizando el helper route:  
  * Copiar

```

<a href="{{ route('posts.index') }}">Ver todos los posts</a>
```

* **Separación de lógica**:  
  * Cada acción se asocia con un método específico del controlador (por ejemplo, index, create, store). Esto nos ayuda a mantener el código organizado y fácil de mantener.

---

## **Ventajas de seguir estas convenciones**

* Facilita la transición a Route::resource en el futuro, ya que las rutas personalizadas seguirán el mismo estándar.  
* Mejora la legibilidad y consistencia en todo el proyecto.  
* Permite a otros desarrolladores comprender rápidamente la estructura de las rutas y las acciones asociadas.

# Controladores

# **Controladores**

Podemos crear un controlador con:

Copiar

```
php artisan make:controller <nombredelcontrolador>
```

Esto creará un controlador en la carpeta "/Http/Controllers". Dicho controlador consistirá en una clase con una serie de métodos que tendremos que definir nosotros. Dichos métodos se invocarán desde el router. En dichos métodos se cargarán las vistas y se invocarán a los modelos correspondientes. A continuación se muestra un ejemplo de un route:

Copiar

```
Route::get('/crear-cuenta', [RegisterController::class, 'index']);
```

y de su asociado:

Copiar

```
class RegisterController extends Controller
{
   public function index() {
       return view('auth.register');
   }
}
```

Los controladores nos ayudan a tener el código mejor organizado y separar la funcionalidad de las aplicaciones.

### **Pasar datos a las vistas**

En Laravel, cuando renderizamos una vista con view('nombre\_de\_la\_vista', $datos), podemos pasar un segundo parámetro que es un array de datos que queremos que la vista utilice.

Si no pasamos los datos necesarios, la vista no sabrá nada sobre las variables definidas en el controlador y, por lo tanto, no podrá utilizarlas.

Hay que recordar que en el patrón MVC (Modelo-Vista-Controlador), el controlador prepara los datos que la vista necesita para presentarlos al usuario.

#### **Ventajas de Usar compact()**

* **Código más limpio y conciso**:  
  * Si tienes varias variables que quieres pasar a la vista, compact() te permite hacerlo de forma sencilla sin tener que escribir un array asociativo manualmente.  
  * Por ejemplo:  
  * Copiar

```

$name = 'Juan';
$age = 25;
$city = 'Madrid';
return view('profile', compact('name', 'age', 'city'));
```

* **Evita errores tipográficos**:  
  * Al usar compact(), nos aseguramos de que las claves del array asociativo coinciden exactamente con los nombres de las variables, reduciendo el riesgo de errores por nombres mal escritos.

#### **Alternativas a compact()**

* **Pasar un array asociativo manualmente**:  
* Copiar

```
return view('doubt_form', ['modules' => $modules]);
```

* **Usar el método with() de la vista**:  
* Copiar

```
return view('doubt_form')->with('modules', $modules);
```

  * Aunque es válido, puede ser menos práctico si necesitas pasar múltiples variables.

### **Respuesta a una solicitud POST en el controlador**

Cuando un usuario envía un formulario (solicitud POST), el navegador espera una respuesta del servidor. En este caso, lo ideal es redirigir a otra ruta usando redirect().

Copiar

```
return redirect()->route('doubt.form')->with('success', 'Su duda ha sido enviada correctamente.');
```

De esta forma:

* El servidor responde con una redirección a una ruta específica.  
* El navegador realiza una nueva solicitud GET a esa ruta.  
* Si el usuario refresca la página, solo recarga la página actual (la ruta redirigida), sin reenviar los datos del formulario.

Por otro lado:

* **with('success', 'Mensaje')**:  
  * Permite pasar datos de la sesión de una solicitud a otra.  
  * En la vista, podemos acceder a estos mensajes utilizando session('success').  
* **Beneficio**: Podemos informar al usuario sobre el resultado de su acción sin exponer datos sensibles.

**Este patrón de funcionamiento se denomina patrón PRG (Post/Redirect/Get)**

El patrón **PRG** (Post/Redirect/Get) es un patrón de diseño en desarrollo web que se utiliza para mejorar la experiencia del usuario y prevenir problemas como la duplicación de envíos de formularios. Este patrón es especialmente útil para evitar que, al actualizar una página después de enviar un formulario, el navegador vuelva a enviar los datos, lo que podría causar acciones no deseadas como transacciones duplicadas.

¿Cómo funciona el patrón PRG?

* **Post (Enviar):** El usuario completa un formulario en una página web y lo envía. Esto genera una solicitud HTTP **POST** al servidor con los datos ingresados.  
* **Redirect (Redireccionar):** Después de procesar la solicitud, en lugar de responder directamente con una página web, el servidor envía una respuesta HTTP **302** (Found) o **303** (See Other) que indica al navegador que debe redirigir a una nueva URL.  
* **Get (Obtener):** El navegador sigue la redirección y realiza una solicitud HTTP **GET** a la nueva URL. El servidor responde con la página resultante que se muestra al usuario.

Beneficios del patrón PRG:

* **Prevención de duplicados:** Evita que, al refrescar la página, el navegador vuelva a enviar el formulario, lo que podría causar acciones duplicadas.  
* **Mejora de la usabilidad:** Proporciona URLs únicas para cada estado de la aplicación, lo que facilita la navegación y el uso de botones de atrás y adelante.  
* **Mejora de la seguridad:** Reduce el riesgo de reenvíos no intencionados de datos sensibles o transacciones críticas.

Ejemplo práctico:

Imagina que estás realizando una compra en línea:

* Al confirmar la compra (POST), el servidor procesa el pago.  
* En lugar de mostrar directamente la confirmación, el servidor redirige a una página de confirmación de pedido (Redirect).  
* El navegador carga la página de confirmación (GET), mostrando los detalles del pedido sin riesgo de volver a procesar el pago si se actualiza la página.

### **Denominación de los métodos de los controladores que manejan los diferentes tipos de rutas**

Laravel adopta una convención de nomenclatura para los métodos de los controladores que manejan las diferentes rutas, especialmente cuando se utiliza el enrutamiento de recursos. Esta convención es parte de lo que hace a Laravel tan atractivo, ya que proporciona una estructura clara y consistente para el desarrollo de aplicaciones.

A continuación se incluye una lista de las acciones CRUD, los métodos HTTP correspondientes, y los nombres de métodos convencionales en los controladores:

* **index**: Muestra una lista de todos los recursos. Utilizado con rutas GET.  
* **create**: Muestra un formulario para crear un nuevo recurso. Utilizado con rutas GET.  
* **store**: Guarda un nuevo recurso en la base de datos. Utilizado con rutas POST.  
* **show**: Muestra un recurso específico. Utilizado con rutas GET.  
* **edit**: Muestra un formulario para editar un recurso existente. Utilizado con rutas GET.  
* **update**: Actualiza un recurso en la base de datos. Utilizado con rutas PUT/PATCH.  
* **destroy**: Elimina un recurso específico de la base de datos. Utilizado con rutas DELETE.

Para obtener información detallada sobre las convenciones de nomenclatura de los métodos en los controladores de recursos de Laravel, podemos consultar [la siguiente página](https://laravel.com/docs/10.x/controllers#actions-handled-by-resource-controllers) de la documentación oficial de Laravel.

Si creamos el controlador con el siguiente comando, Laravel creará todos estos métodos en el controlador:

php artisan make:controller NombreDelControlador \--resource

# Blade y vistas dinámicas

## **Blade y vistas dinámicas**

---

### **Objetivos del bloque**

* Profundizar en el uso del motor de plantillas Blade de Laravel.  
* Aprender a reutilizar plantillas con layouts y secciones.  
* Mostrar datos dinámicos mediante estructuras de control (if, foreach, switch).  
* Aplicar lógica condicional y bucles directamente en las vistas.  
* Organizar correctamente la presentación del contenido separándola de la lógica de negocio.

---

## **¿Qué es Blade?**

**Blade** es el motor de plantillas oficial de Laravel. Es rápido, limpio y muy fácil de usar.

* Permite **insertar PHP en HTML** de forma sencilla.  
* Ayuda a escribir **estructuras de control** con una sintaxis clara.  
* Facilita la **reutilización de plantillas** mediante layouts.  
* Protege frente a XSS al mostrar variables ({{ $dato }} escapa automáticamente.

---

## **Organización de las vistas**

Las vistas se guardan en:

```
resources/views/
```

Puedes crear subcarpetas para organizar mejor. Por ejemplo:

```
resources/views/usuarios/index.blade.php
resources/views/layouts/app.blade.php
```

Para cargar una vista:

```
return view('usuarios.index');
```

No es necesario incluir.blade.php en el nombre.  
---

## **Mostrar contenido dinámico**

```
<p>Hola, {{ $nombre }}</p>
```

* Blade convierte esto en: \<?php echo e($nombre); ?\>  
* Esto **escapa el contenido**, lo que evita ataques XSS.  
* Si quieres mostrar contenido sin escapar (no recomendado), usa {\!\! $variable \!\!}

---

## **Directivas Blade**

Las directivas Blade se podrían considerar una especie de atajos a estructuras de control comunes en PHP, como sentencias condicionales o bucles. Por ejemplo:

```php
@if ($records > 0)
    I have records!
@else
    I don't have any records!
@endif
```

en lugar de:

```php
<?php if($records > 0) { ?>  
    I have records!  
<?php } else { ?>  
    I don't have any records!  
<?php } ?>
```

Mediante el uso de un motor de plantillas evitamos utilizar sintaxis PHP o etiquetas PHP en nuestros ficheros de vistas. En su lugar deberíamos usar **directivas** o **helpers** (las veremos más adelante). La ventaja es que los motores de plantillas limitan el número de funcionalidades disponibles en las vistas y de esta forma se aseguran de que no hacemos locuras en las vistas. Es recomendable que si no encontramos una directiva o helper para una funcionalidad que necesitemos implementar en una vista es, posiblemente, porque dicha funcionalidad no debería estar implementada en la vista. Quizás debería estarlo en un controlador o en otro fichero.

### Directiva **extends**

Se utiliza en las vistas para cargar otras vistas. Por ejemplo, para cargar una plantilla que contenga el menú principal que se podría incluir en el encabezado de todas nuestras páginas.

```php
@extends('layout.app')
```

Esa línea cargaría el contenido de './views/layout/app.blade.php'. Destaca el hecho de que en esta directiva las carpetas se separan de los ficheros utilizando el carácter "." en lugar de "/". Además, parte de la ruta es implícita como se puede apreciar, y el sufijo del fichero se presupone que es ".blade.php".

### Directiva **yield**

Sirve para declarar una especie de marcador/contenedor en una vista para posteriormente inyectarle contenido desde las vistas padre. Para esto último se utiliza la directiva **@section**. Requiere dos parámetros. El primero es el identificador del marcador y el segundo (opcional) es un valor por defecto que se inyectará en caso de que la vista no incluya código para dicho marcador.

En la vista hija incluiríamos:

```php
<h1>@yield('titulo')</h1>
```

Y en la vista principal incluiríamos:

```php
@extends('layouts.app')
...
@section('titulo')
    Página principal
@endsection
```

### Directiva **route**

Devuelve la URL a la que hace referencia el primer parámetro. Previamente debe estar definido el nombre de la ruta.

```php
<a href="{{ route('product.show' }}">...</a>
```

Si la ruta tiene un parámetro, la forma correcta de pasárselo es la siguiente:

```php
<a href="{{ route('product.show', ['id'=> $product["id"]]) }}">
```

Puedes encontrar más información sobre route en la documentación oficial.

### Directiva **CSRF**

La directiva @csrf en Laravel es una forma corta de incluir un token CSRF (Cross-Site Request Forgery) en los formularios HTML. Este token es una medida de seguridad importante en aplicaciones web para prevenir ataques de tipo CSRF.

En un ataque CSRF, un atacante podría engañar a los usuarios de la aplicación para que realicen acciones no intencionadas en un sitio web. Al incluir un token CSRF en tus formularios, Laravel se asegura de que cada solicitud que modifica datos proviene realmente del usuario de la aplicación y no de un tercero.

Cuando utilizas la directiva @csrf en un formulario, Laravel genera automáticamente un campo oculto con un token único para ese usuario. Cuando el formulario se envía, el token se envía junto con los demás datos del formulario. Luego, Laravel verifica este token en el servidor para asegurarse de que la solicitud es legítima.

Si el token no está presente o no coincide, Laravel rechazará la solicitud, protegiendo así la aplicación contra ataques CSRF. Es una práctica recomendada y muy importante incluir esta directiva en todos tus formularios HTML que realicen cambios en los datos del servidor (como inserciones, actualizaciones o eliminaciones). Se debe incluir dentro del formulario HTML, en la vista correspondiente.

### Dobles llaves **{{...}}**

Blade ofrece una sintaxis sencilla y potente para combinar código PHP con HTML de forma elegante y limpia. Uno de los elementos clave de Blade son las dobles llaves {{ ... }}, que se utilizan para mostrar datos en las vistas.

Las dobles llaves {{ ... }} se utilizan para imprimir el valor de una variable o una expresión en la vista. Al hacerlo, Blade aplica automáticamente escape de entidades HTML para proteger contra ataques XSS (Cross-Site Scripting), asegurando que el contenido mostrado es seguro.

Sintaxis básica:

```php
{{ $variable }}
```

## **Helpers**

Los helpers en Laravel son funciones globales de PHP que están disponibles en cualquier parte de la aplicación. Estas funciones proporcionan soluciones rápidas y convenientes para tareas comunes, lo que facilita el desarrollo al reducir la cantidad de código que necesitas escribir.

Los helpers te permiten realizar operaciones frecuentes de forma sencilla, sin tener que instanciar clases o importar namespaces. Laravel incluye una variedad de helpers por defecto

Para invocar a helpers en una vista, tenemos que incluirlos entre dobles llaves.

Por ejemplo,

```php
{{ now() }}
```

Este helper muestra la fecha y hora actuales.

Otro ejemplo lo tenemos en el helper asset, que genera una URL usando el esquema actual de la petición (HTTP o HTTPS).

Puedes encontrar más información sobre helpers en [https://laravel.com/docs/10.x/helpers](https://laravel.com/docs/10.x/helpers)

## **Variables**

### Variable **$errors**

Laravel proporciona una variable $errors que está disponible en todas las vistas. Esta variable contiene los mensajes de error generados durante la validación de datos en una solicitud HTTP, generalmente al procesar formularios. Esto permite que los desarrolladores muestren mensajes de error específicos a los usuarios, indicando qué campos no cumplieron con las reglas de validación.

Mediante el método $errors-\>any() se puede consultar si existe algún error, y en caso afirmativo, se pueden recorrer todos los errores mendiante el método $errors-\>all(), que devuelve un array con los mensajes de cada uno de los errores, tal y como se explica en la documentación oficial.

## **Estructuras de control en Blade**

### **Condicionales**

```
@if ($edad >= 18)
    <p>Eres mayor de edad.</p>
@elseif ($edad >= 13)
    <p>Eres adolescente.</p>
@else
    <p>Eres menor.</p>
@endif
```

### **Ternario (condición corta)**

```
<p>{{ $activo ? 'Usuario activo' : 'Usuario inactivo' }}</p>
```

---

### **Bucles**

```
@for ($i = 0; $i < 5; $i++)
    <p>Iteración {{ $i }}</p>
@endfor
```

```
@foreach ($usuarios as $usuario)
    <li>{{ $usuario }}</li>
@endforeach
```

```
@forelse ($productos as $producto)
    <li>{{ $producto }}</li>
@empty
    <p>No hay productos disponibles</p>
@endforelse
```

```
@while (true)
    <p>Este bucle nunca termina (mejor evitarlo)</p>
@endwhile
```

---

### **Estructura switch**

```
@switch($tipo)
    @case('admin')
        <p>Usuario administrador</p>
        @break
    @case('editor')
        <p>Usuario editor</p>
        @break
    @default
        <p>Usuario estándar</p>
@endswitch
```

---

## **Layouts y secciones**

Blade permite reutilizar plantillas para que no repitas todo el HTML en cada vista.

---

### **Paso 1: Crear el layout principal**

resources/views/layouts/app.blade.php:

```
<!DOCTYPE html>
<html>
<head>
    <title>@yield('titulo')</title>
</head>
<body>
    <header>
        <h1>Mi aplicación Laravel</h1>
    </header>

    <main>
        @yield('contenido')
    </main>

    <footer>
        <p>&copy; {{ date('Y') }}</p>
    </footer>
</body>
</html>
```

---

### **Paso 2: Crear una vista que extienda el layout**

resources/views/home.blade.php:

```
@extends('layouts.app')

@section('titulo', 'Página de inicio')

@section('contenido')
    <p>Bienvenido a la aplicación Laravel.</p>
@endsection
```

---

**@extends:** hereda de un layout  
**@section:** define el contenido para una sección  
**@yield:** indica el lugar donde se mostrará el contenido de la sección  
---

## **Ejemplo práctico completo**

**Ruta en web.php:**

```
Route::get('/alumnos', function () {
    $alumnos = ['Carlos', 'Lucía', 'Marta'];
    return view('alumnos.index', compact('alumnos'));
});
```

**Vista resources/views/alumnos/index.blade.php:**

```
@extends('layouts.app')

@section('titulo', 'Listado de alumnos')

@section('contenido')
    <h2>Listado de alumnos</h2>
    <ul>
        @foreach($alumnos as $alumno)
            <li>{{ $alumno }}</li>
        @endforeach
    </ul>
@endsection
```

---

## **Actividades sugeridas para practicar**

1. Crear una vista Blade que muestre un saludo personalizado según la hora del día.  
2. Crear un array de módulos y mostrarlos con un bucle.  
3. Crear un layout base con cabecera y pie de página, y tres vistas diferentes que lo usen:  
   * Inicio  
   * Quiénes somos  
   * Contacto

---

## **Buenas prácticas con Blade**

* Usa @include para fragmentos pequeños repetidos (como menús o alertas).  
* Usa @each si quieres iterar una vista parcial (ej: cada tarjeta de producto).  
* No incluyas lógica compleja en Blade, solo presentación.

---

## **📎 Enlaces útiles**

* [Blade en la documentación oficial](https://laravel.com/docs/blade)

# Formularios en Laravel

# **Formularios en Laravel**

---

## **Objetivos del bloque**

* Aprender a crear formularios HTML usando Blade.  
* Comprender las diferencias entre los métodos GET y POST.  
* Enviar datos desde el navegador al servidor usando formularios.  
* Recuperar y procesar esos datos en un controlador.  
* Validar la información introducida por el usuario.  
* Mostrar mensajes de error de forma amigable.

---

## **¿Qué es un formulario?**

Un formulario permite **recoger datos del usuario** y enviarlos al servidor.

En Laravel, los formularios se escriben en HTML dentro de las **vistas Blade**, pero se procesan con controladores.

---

## **¿GET o POST?**

| Método | Características |
| ----- | ----- |
| **GET** | Envía los datos en la URL (visible). Se usa para búsquedas, filtros. No debe modificar datos. |
| **POST** | Envía los datos ocultos en el cuerpo de la petición. Se usa para enviar formularios que modifican datos (crear, actualizar). |

---

## **Estructura de un formulario en Blade**

```
<form action="/registro" method="POST">
    @csrf

    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" id="nombre">

    <button type="submit">Enviar</button>
</form>
```

### **✅ Claves importantes**

* action="/registro": ruta a la que se enviarán los datos.  
* method="POST": método HTTP usado.  
* **@csrf: muy importante**. Blade insertará un campo oculto con un token de seguridad. Laravel lo exige para formularios POST y PUT.

---

## **Ejemplo completo**

### **1\. Definir la ruta**

```
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactoController;

Route::get('/contacto', [ContactoController::class, 'formulario']);
Route::post('/contacto', [ContactoController::class, 'procesar']);
```

---

### **2\. Crear el controlador**

```
php artisan make:controller ContactoController
```

```
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactoController extends Controller
{
    public function formulario() {
        return view('contacto');
    }

    public function procesar(Request $request) {
        $nombre = $request->input('nombre');
        return view('respuesta', compact('nombre'));
    }
}
```

---

### **3\. Vista resources/views/contacto.blade.php**

```
<!DOCTYPE html>
<html>
<head><title>Contacto</title></head>
<body>
    <h1>Formulario de contacto</h1>

    <form action="/contacto" method="POST">
        @csrf
        <label>Nombre:</label>
        <input type="text" name="nombre">
        <button type="submit">Enviar</button>
    </form>
</body>
</html>
```

---

### **4\. Vista resources/views/respuesta.blade.php**

```
<h1>Gracias por contactarnos, {{ $nombre }}</h1>
```

---

## **Recuperar otros tipos de datos**

```
<!-- Email -->
<input type="email" name="email">

<!-- Área de texto -->
<textarea name="mensaje"></textarea>

<!-- Radio -->
<input type="radio" name="opcion" value="A"> Opción A
<input type="radio" name="opcion" value="B"> Opción B

<!-- Checkbox -->
<input type="checkbox" name="intereses[]" value="PHP"> PHP
<input type="checkbox" name="intereses[]" value="Laravel"> Laravel

<!-- Select -->
<select name="modulo">
    <option value="DWES">Desarrollo web en entorno servidor</option>
    <option value="DAW">Diseño de interfaces</option>
</select>
```

Laravel puede recuperar todos esos valores con $request-\>input('campo'). Si es un array, puedes recorrerlo con un foreach.

---

## **Validación de datos**

Laravel facilita la validación con el método validate().

```
$request->validate([
    'nombre' => 'required|min:3|max:50',
    'email' => 'required|email',
    'mensaje' => 'nullable|max:500'
]);
```

Esto:

* Verifica que los campos cumplan los requisitos.  
* Redirige automáticamente a la vista anterior si hay errores.  
* Guarda los errores en una variable $errors.

---

## **Mostrar mensajes de error en la vista**

```
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
```

---

### **Mostrar error específico debajo del campo:**

```
<input type="text" name="nombre">
@error('nombre')
    <small>{{ $message }}</small>
@enderror
```

---

## **Reutilizar valores introducidos**

Cuando hay errores, Laravel recuerda los datos introducidos. Puedes mostrarlos así:

```
<input type="text" name="nombre" value="{{ old('nombre') }}">
```

---

## **🧪 Reglas de validación comunes**

| Regla | Qué hace |
| ----- | ----- |
| required | El campo es obligatorio |
| email | Debe ser un email válido |
| min:n | Mínimo n caracteres |
| max:n | Máximo n caracteres |
| numeric | Debe ser un número |
| in:x,y,z | Solo acepta esos valores |
| array | Debe ser un array (por ejemplo, checkbox múltiple) |

---

## **Buenas prácticas**

* Valida SIEMPRE los datos recibidos, incluso si no son obligatorios.  
* Usa nombres descriptivos para los campos.  
* Incluye comentarios explicativos en los controladores.  
* Guarda las reglas de validación en un Request personalizado si crece mucho el código.

---

## **Actividades para practicar**

1. Crear un formulario que recoja nombre, email y mensaje, y lo procese en un controlador.  
2. Añadir validación básica (required, email, max) y mostrar errores.  
3. Añadir campos tipo checkbox o select para ampliar el formulario.  
4. Implementar un sistema de sugerencias, que recoja sugerencias del usuario y muestre un resumen.

---

## **📚 Enlaces útiles**

* [Validación en Laravel](https://laravel.com/docs/validation)  
* [Formularios Blade](https://laravel.com/docs/blade#form-method-spoofing)  
* [@error y $errors](https://laravel.com/docs/validation#quick-displaying-the-validation-errors)

# Validación de formularios (I)

## **Validación de datos (básica) en Laravel**

### **1\. ¿Qué es la validación?**

La **validación** es el proceso mediante el cual comprobamos que los datos introducidos por el usuario cumplen con los requisitos que necesitamos antes de almacenarlos, procesarlos o enviarlos a otra parte del sistema.

Por ejemplo:

* ¿El campo “email” contiene una dirección válida?  
* ¿El campo “nombre” no está vacío?  
* ¿La contraseña tiene al menos 8 caracteres?

Laravel proporciona un sistema de validación **muy potente y sencillo de usar** que podemos aplicar directamente en nuestros **controladores**, sin tener que escribir estructuras if manuales como hacíamos en PHP base.

---

### **2\. Validación rápida con $request-\>validate()**

Laravel permite validar los datos de forma rápida y clara usando el método validate() sobre la petición:

```
public function store(Request $request)
{
    $request->validate([
        'nombre' => 'required|max:50',
        'email' => 'required|email',
        'mensaje' => 'nullable|max:300',
    ]);

    // Si los datos son válidos, se continúa ejecutando esta parte del código
    return view('confirmacion');
}
```

Este método:

* Aplica automáticamente las reglas que definimos.  
* Si **hay errores**, Laravel:  
  * **Redirige automáticamente** a la vista anterior.  
  * **Vuelve a mostrar el formulario**.  
  * **Incluye los errores de validación** en una variable especial ($errors).  
  * **Mantiene los datos ya introducidos** por el usuario.

---

### **3\. Reglas de validación básicas más utilizadas**

| Regla | Descripción |
| ----- | ----- |
| required | El campo es obligatorio |
| email | Debe ser un email válido |
| max:valor | Máximo de caracteres o valor numérico |
| min:valor | Mínimo de caracteres o valor numérico |
| nullable | El campo puede estar vacío |
| numeric | El valor debe ser numérico |
| date | Debe ser una fecha válida |
| in:val1,val2 | Solo se permiten los valores indicados |

---

### **4\. Mostrar errores en Blade**

Laravel nos permite mostrar los errores en Blade fácilmente con la variable $errors.

#### **A. Mostrar todos los errores juntos:**

```
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif
```

#### **B. Mostrar el error de un campo concreto:**

```
@error('nombre')
    <div class="text-danger">{{ $message }}</div>
@enderror
```

---

### **5\. Reenviar los datos anteriores automáticamente**

Laravel guarda los datos enviados para que el usuario no tenga que volver a escribirlos si hay un error. En Blade, se pueden recuperar usando la función old():

```
<input type="text" name="nombre" value="{{ old('nombre') }}">
```

Esto es útil para **prellenar el formulario** si la validación ha fallado.

---

### **6\. Comentarios y buenas prácticas**

* Es importante **comentar el código** para entender qué se valida y por qué.  
* Aunque el sistema de validación de Laravel es muy sencillo, conviene no saturar los controladores. Más adelante aprenderemos a usar **Form Requests** para separar la validación.

---

### **7\. Ejemplo completo**

#### **Formulario (formulario.blade.php):**

```
<form action="{{ route('procesar') }}" method="POST">
    @csrf

    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" value="{{ old('nombre') }}">
    @error('nombre')
        <div class="text-danger">{{ $message }}</div>
    @enderror

    <label for="email">Email:</label>
    <input type="email" name="email" value="{{ old('email') }}">
    @error('email')
        <div class="text-danger">{{ $message }}</div>
    @enderror

    <button type="submit">Enviar</button>
</form>
```

#### **Controlador (FormularioController.php):**

```
public function procesar(Request $request)
{
    $request->validate([
        'nombre' => 'required|max:50',
        'email' => 'required|email',
    ]);

    // Aquí podríamos almacenar, enviar por email, etc.
    return view('confirmacion');
}
```

---

### **8\. Conclusiones**

* Laravel facilita la validación con reglas claras y mensajes automáticos.  
* No necesitamos redirigir manualmente ni escribir mucha lógica: Laravel lo hace por nosotros.  
* Validar los datos es una práctica **esencial** para la seguridad y buen funcionamiento de cualquier aplicación web.

# Validación de formularios (II)

## **Cómo validar los campos de un formulario en el controlador antes de procesarlos**

Cuando utilizamos el método $request-\>validate() en un controlador para validar los datos de una solicitud, Laravel verifica los datos según las reglas proporcionadas.

Copiar

```

  public function submitForm(Request $request)

  {

      $validatedData = $request->validate([

          'email' => 'required|email',

          'module' => 'required',

          // otras reglas...

      ]);



      // Si la validación falla, Laravel redirige automáticamente y pasa los errores

  }
```

Si la validación falla, Laravel automáticamente redirige al usuario de vuelta a la página anterior (normalmente el formulario) y **almacena los errores en la sesión**.

La variable $errors se comparte automáticamente con todas las vistas. Esto significa que en cualquier vista renderizada después de una validación fallida, $errors estará disponible para mostrar los mensajes de error.

En las plantillas Blade, puedes utilizar la variable $errors para mostrar mensajes de error al usuario. Aquí hay algunas formas comunes de hacerlo:

### **Verificar si hay errores:**

Copiar

Copiar

```

@if ($errors->any())

   <div style="color: red;">

       <ul>

           @foreach ($errors->all() as $error)

               <li>{{ $error }}</li>

           @endforeach

       </ul>

   </div>

@endif
```

* **$errors-\>any()**: Verifica si hay algún error.  
* **$errors-\>all()**: Devuelve todos los mensajes de error en un array.

### **Mostrar mensajes de error por campo:**

Si deseas mostrar mensajes de error específicos junto a cada campo del formulario:

Copiar

Copiar

```

<label for="email">Correo:</label><br>

<input type="email" id="email" name="email" value="{{ old('email') }}"><br>

@if ($errors->has('email'))

   <span style="color: red;">{{ $errors->first('email') }}</span><br>

@endif
```

* **$errors-\>has('email')**: Comprueba si hay errores para el campo 'email'.  
* **$errors-\>first('email')**: Obtiene el primer mensaje de error para 'email'. Un solo campo puede tener varios mensajes de error asociados si no cumple con múltiples reglas de validación. Cuando defines reglas de validación para un campo, puedes especificar varias reglas que el campo debe cumplir. Si deseas mostrar **todos los mensajes de error** para un campo, puedes usar $errors-\>get('campo'), que devuelve un array con todos los mensajes.  
* **Ejemplo**:  
* Copiar  
* Copiar

```

@if ($errors->has('email'))

   <ul>

       @foreach ($errors->get('email') as $error)

           <li>{{ $error }}</li>

       @endforeach

   </ul>

@endif
```

* **$errors-\>old('email'):** Para que los usuarios no tengan que volver a ingresar todos los datos en caso de error, puedes utilizar la función old() en los campos del formulario

Puedes consultar las reglas de validación que puedes utilizar [en la web oficial de Laravel.](https://laravel.com/docs/11.x/validation#rule-regex)

## **Personalización de mensajes de error en Laravel**

Cuando utilizamos el método $request-\>validate() para validar formularios, Laravel genera mensajes de error predeterminados para las reglas de validación. Sin embargo, podemos personalizar estos mensajes para adaptarlos mejor a nuestro proyecto. A continuación, explicaremos cómo hacerlo.

### **Definir mensajes personalizados en el método de validación**

Podemos pasar un tercer argumento al método $request-\>validate(), que será un array con los mensajes de error personalizados. Este array debe usar el formato campo.regla como clave y el mensaje personalizado como valor.

Ejemplo:

Copiar

```

public function submitForm(Request $request)

{

   $validatedData = $request->validate(

       [

           'email' => 'required|email',

           'module' => 'required',

       ],

       [

           'email.required' => 'El campo correo electrónico es obligatorio.',

           'email.email' => 'El formato del correo electrónico no es válido.',

           'module.required' => 'Debe seleccionar un módulo.',

       ]

   );



   // Continuar con el procesamiento de datos...

}
```

En este ejemplo:

* email.required: Personaliza el mensaje de error para la regla required del campo email.  
* email.email: Personaliza el mensaje de error para la regla email del campo email.  
* module.required: Personaliza el mensaje de error para la regla required del campo module.

---

### **Usar el archivo de configuración de validaciones**

Para proyectos grandes o mensajes reutilizables, podemos gestionar los mensajes personalizados en un archivo de idioma dedicado. Laravel incluye un archivo validation.php en el directorio resources/lang/es (o cualquier idioma configurado).

Pasos:

* Navegamos a resources/lang/es/validation.php.  
* En este archivo, podemos añadir mensajes personalizados en la sección custom.

Ejemplo de configuración:

Copiar

```

'custom' => [

   'email' => [

       'required' => 'El campo correo electrónico es obligatorio.',

       'email' => 'Introduce un correo electrónico válido.',

   ],

   'module' => [

       'required' => 'Es necesario seleccionar un módulo.',

   ],

],
```

En las reglas de validación del controlador, Laravel utilizará automáticamente estos mensajes.  
---

### **Mensajes genéricos personalizados para reglas específicas**

Si deseamos personalizar mensajes genéricos para una regla, independientemente del campo, podemos definirlos en la sección attributes de validation.php.

Ejemplo:

Copiar

```

'attributes' => [

   'required' => 'El campo :attribute es obligatorio.',

],
```

Aquí, :attribute será reemplazado dinámicamente por el nombre del campo. Para traducir los nombres de los campos, podemos añadirlos en el mismo archivo:

Copiar

```

'attributes' => [

   'email' => 'correo electrónico',

   'module' => 'módulo',

],
```

---

### **Mostrar los mensajes personalizados en la vista**

Los mensajes personalizados estarán disponibles en la variable $errors de las vistas, como en el caso de los mensajes predeterminados.

Ejemplo en Blade:

Copiar

```

@if ($errors->has('email'))
   <span style="color: red;">{{ $errors->first('email') }}</span>
@endif
```

# Arrays y estructuras de control

## **Arrays y estructuras de control en Laravel (Blade \+ PHP)**

Laravel utiliza **Blade** como motor de plantillas y está completamente integrado con PHP, por lo que podemos utilizar estructuras de control (condicionales, bucles…) y arrays de forma sencilla y natural.

---

### **1\. ¿Qué es un array?**

Un **array** es una estructura de datos que permite almacenar múltiples valores en una sola variable. En Laravel (y PHP en general), los arrays pueden ser:

* **Indexados** (con índices numéricos)  
* **Asociativos** (con claves definidas)  
* **Multidimensionales** (arrays dentro de arrays)

#### **Ejemplo en un controlador:**

```
$modulos = ['DWES', 'DAW', 'DIW', 'EIE'];
return view('modulos', ['modulos' => $modulos]);
```

---

### **2\. Acceso a arrays desde Blade**

En la vista Blade puedes acceder a un array con la sintaxis de corchetes:

```
<p>{{ $modulos[0] }}</p> <!-- Mostrará: DWES -->
```

O recorriéndolo:

```
<ul>
    @foreach ($modulos as $modulo)
        <li>{{ $modulo }}</li>
    @endforeach
</ul>
```

---

### **3\. Tipos de estructuras de control en Laravel (Blade)**

#### **A. Condicionales** 

#### **@if, @elseif, @else:**

```
@if($edad >= 18)
    <p>Eres mayor de edad</p>
@elseif($edad >= 13)
    <p>Eres adolescente</p>
@else
    <p>Eres menor de edad</p>
@endif
```

##### **@unless:**

Negación de una condición (como if (\!condición) en PHP):

```
@unless($user->admin)
    <p>No tienes permisos de administrador</p>
@endunless
```

---

#### **B. Bucles**

##### **@foreach:**

```
@foreach($modulos as $modulo)
    <p>{{ $modulo }}</p>
@endforeach
```

También puedes acceder al índice:

```
@foreach($modulos as $indice => $modulo)
    <p>{{ $indice }} - {{ $modulo }}</p>
@endforeach
```

##### **@for:**

```
@for($i = 0; $i < 5; $i++)
    <p>Iteración {{ $i }}</p>
@endfor
```

##### **@while y @do…@while:**

```
@php $contador = 0; @endphp

@while($contador < 3)
    <p>Contador: {{ $contador }}</p>
    @php $contador++; @endphp
@endwhile
```

```
@php $contador = 0; @endphp

@do
    <p>Contador: {{ $contador }}</p>
    @php $contador++; @endphp
@while($contador < 3)
```

---

### **4\. Arrays asociativos**

```
$datos = [
    'nombre' => 'Carlos',
    'email' => 'carlos@ejemplo.com'
];

return view('usuario', ['datos' => $datos]);
```

```
<p>Nombre: {{ $datos['nombre'] }}</p>
<p>Email: {{ $datos['email'] }}</p>
```

---

### **5\. Array multidimensional**

```
$usuarios = [
    ['nombre' => 'Ana', 'email' => 'ana@web.com'],
    ['nombre' => 'Luis', 'email' => 'luis@web.com']
];
```

```
@foreach($usuarios as $usuario)
    <p>{{ $usuario['nombre'] }} - {{ $usuario['email'] }}</p>
@endforeach
```

---

### **6\. Incluir arrays dentro de formularios**

Laravel puede trabajar con arrays enviados desde formularios:

```
<input type="text" name="temas[]" value="PHP">
<input type="text" name="temas[]" value="Laravel">
```

En el controlador:

```
$temas = $request->input('temas');
```

---

### **7\. Comentarios y buenas prácticas**

* En Blade puedes comentar usando {{-- comentario \--}} (no se muestra en el HTML generado).  
* Procura no mezclar lógica compleja en la vista. Si necesitas cálculos o transformaciones, hazlo antes en el controlador.  
* Usa los arrays y estructuras de control para hacer que tu aplicación sea más dinámica e interactiva.

---

### **8\. Ejercicio para practicar**

**Objetivo**: Practicar estructuras de control y arrays con Blade.

**Actividad**: Crea una vista Blade que reciba un array de libros desde el controlador. Cada libro tendrá un título, autor y número de páginas. Muestra una lista con esta información y:

* Muestra un mensaje distinto si el número de páginas es mayor o menor a 300\.

* Muestra el total de libros al final.

# Funciones auxiliares / Helpers

## **Funciones auxiliares / Helpers en Laravel**

En Laravel, las **funciones auxiliares** (también llamadas *helpers*) son funciones que nos permiten **simplificar tareas comunes** en nuestras aplicaciones, como trabajar con rutas, cadenas de texto, arrays, fechas, etc.

---

### **1\. ¿Qué son los helpers en Laravel?**

Son **funciones globales** que puedes usar en cualquier parte de tu aplicación (controladores, vistas, middlewares…). No es necesario importarlas: están siempre disponibles.

Laravel ya incluye **una gran cantidad de helpers predefinidos** que cubren múltiples necesidades.

---

### **2\. Algunos helpers útiles en el desarrollo cotidiano**

#### **🔸 route()**

Devuelve la URL de una ruta con nombre.

```
<a href="{{ route('contacto') }}">Ir a contacto</a>
```

#### **🔸 url()**

Devuelve una URL absoluta a una ruta determinada:

```
<a href="{{ url('productos') }}">Ver productos</a>
```

#### **🔸 asset()**

Devuelve la ruta pública hacia un recurso (imagen, CSS, JS…):

```
<link href="{{ asset('css/estilos.css') }}" rel="stylesheet">
<img src="{{ asset('img/logo.png') }}" alt="Logo">
```

#### **🔸 old()**

Permite recuperar el valor antiguo de un campo de formulario tras una validación fallida:

```
<input type="text" name="nombre" value="{{ old('nombre') }}">
```

---

### **3\. Helpers de cadenas de texto (Strings)**

Laravel incluye helpers para trabajar con cadenas mediante la clase Str:

```
{{ \Illuminate\Support\Str::upper('hola mundo') }} <!-- HOLA MUNDO -->
{{ \Illuminate\Support\Str::slug('Esto es un título') }} <!-- esto-es-un-titulo -->
```

También puedes importar la clase si trabajas desde un controlador:

```
use Illuminate\Support\Str;

Str::limit($descripcion, 100); // Corta la cadena a 100 caracteres
```

---

### **4\. Helpers de arrays**

Laravel también incluye funciones para manipular arrays, como Arr::get(), Arr::has(), Arr::only(), etc.

```
use Illuminate\Support\Arr;

$usuario = ['nombre' => 'Laura', 'email' => 'laura@ejemplo.com'];

$email = Arr::get($usuario, 'email'); // Devuelve 'laura@ejemplo.com'
```

---

### **5\. Helpers de depuración**

#### **🔸 dd() – Dump and Die**

Muestra el contenido de una variable y detiene la ejecución del script.

```
dd($usuarios);
```

#### **🔸 dump()**

Muestra el contenido de la variable pero **no detiene** la ejecución.

---

### **6\. Helpers personalizados**

En Laravel también puedes definir tus **propios helpers**, si detectas que alguna función la repites mucho a lo largo del proyecto.

#### **Pasos:**

1. **Crear el archivo** (por ejemplo, app/helpers.php).  
2. **Definir tus funciones**:

```
function saludo($nombre) {
    return "Hola, $nombre!";
}
```

3. **Registrar el helper** en composer.json:

```
"autoload": {
    "files": [
        "app/helpers.php"
    ]
}
```

4. **Actualizar Composer:**

```
composer dump-autoload
```

Ahora podrás usar saludo('Sergio') desde cualquier parte del proyecto.

---

### **7\. Buenas prácticas**

* **Evita helpers con lógica compleja.** Si la función crece mucho, considera usar una clase.  
* **Nombra bien tus funciones.** Usa nombres que reflejen exactamente lo que hacen.  
* **Documenta tus funciones.** Añade comentarios si no es evidente su funcionamiento.

---

### **8\. Ejemplo práctico**

#### **Objetivo: reutilizar una función para formatear mensajes**

1. Crea un helper llamado formatea\_mensaje($mensaje, $usuario) que devuelva algo como:

```
return strtoupper($usuario) . ": " . ucfirst($mensaje);
```

2. Úsalo desde una vista Blade:

```
<p>{{ formatea_mensaje('tengo una duda importante', 'sergio') }}</p>
<!-- Mostrará: SERGIO: Tengo una duda importante -->
```

# Anexo I: Git y Laravel

## **Git y Laravel**

Por defecto, al crear un proyecto Laravel, se genera un fichero ".gitignore" que incluye una serie de ficheros y carpetas específicos de cada usuario, que no se deberían subir a un repositorio Git. Esos directorios y ficheros son imprescindibles para ejecutar la aplicación Laravel. Para generarlos, después de hacer un clon del repositorio, deberemos ejecutar los siguientes comandos dentro de la carpeta del proyecto:

* **composer install** \-\> Necesario para instalar todas las dependencias requeridas por el proyecto. Es importante revisar la salida de la ejecución de este comando, pues se pueden generar errores relativos a extensiones de PHP que no están instaladas y que no permiten instalar las dependencias del proyecto.  
* **cp .env.example .env** \-\> Por motivos de seguridad, el archivo .env (archivo de varriables de entorno) está incluido en el .gitignore, lo que significa que no se sube al repositorio de Git. Esto previene que información sensible se exponga en repositorios públicos o se comparta inadvertidamente con otros colaboradores.  
* **php artisan key:generate** \-\> Genera una clave de aplciación única. Laravel utiliza la clave de aplicación (APP\_KEY en el archivo .env) para cifrar y descifrar datos sensibles, como sesiones de usuario, tokens y otros elementos que requieren seguridad. Esta clave asegura que los datos cifrados solo puedan ser interpretados por tu aplicación. La clave garantiza que los datos cifrados estén protegidos y solo accesibles por tu aplicación. Sin la clave, características como autenticación y manejo de sesiones pueden fallar.  
* **php artisan migrate** \-\> Este comando genera las tablas necesarias para almacenar las sesiones en la base de datos SQLite. Sin la ejecución de este comando, a pesar de que la base de datos se cree con el comando anterior, ésta permanecerá vacía.

# Anexo II: Compact

## **¿Qué es compact() en PHP y por qué se usa en Laravel?**

*compact()* es una **función propia de PHP** que se usa mucho en Laravel para **pasar variables desde un controlador (o desde web.php) a una vista**.

#### **Su función:**

Convierte **nombres de variables** en un **array asociativo**, donde cada nombre se convierte en la clave, y el valor asociado es el valor de la variable en ese momento.

---

### **Ejemplo sin compact()**

Supón que tienes dos variables:

```
$nombre = 'Sergio';
$curso = 'Desarrollo Web en Entorno Servidor';
```

Y quieres pasarlas a una vista llamada inicio.blade.php. Puedes hacerlo así:

```
return view('inicio', [
    'nombre' => $nombre,
    'curso' => $curso
]);
```

---

### **El mismo ejemplo usando compact()**

```
$nombre = 'Sergio';
$curso = 'Desarrollo Web en Entorno Servidor';

return view('inicio', compact('nombre', 'curso'));
```

Esto **hace exactamente lo mismo** que el ejemplo anterior, pero de una forma más **limpia y legible**, especialmente cuando hay muchas variables que se quieren pasar a la vista.

---

### **¿Cómo funciona internamente?**

Cuando usas:

```
compact('nombre', 'curso')
```

PHP devuelve:

```
[
  'nombre' => 'Sergio',
  'curso' => 'Desarrollo Web en Entorno Servidor'
]
```

Laravel recibe este array y lo hace disponible dentro de la vista inicio.blade.php.

---

### **¿Dónde se suele usar?**

* En **controladores** (lo más común).

* En **rutas definidas directamente en web.php** cuando haces pruebas o scripts muy simples.

---

### **Precaución**

Las variables que pongas entre comillas en compact() **deben existir previamente**. Si no, PHP lanza una advertencia.

Ejemplo incorrecto:

```
return view('inicio', compact('nombre', 'apellido')); // Si 'apellido' no está definida, dará error
```

---

### **Recomendación**

Usa compact() cuando quieras pasar varias variables **que ya tienen nombres representativos**. Hace el código más limpio y Laravel lo soporta perfectamente.

