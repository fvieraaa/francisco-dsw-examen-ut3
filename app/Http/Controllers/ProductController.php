<?php
//Francisco Viera Hernández

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

//esta es la clase 
class ProductController extends Controller
{
    //aqui hacemos el store que recibirá los request del cuestionario
    public function store(Request $request)
    {
    //aqui recogemos los request y los validamos
        $request->validate([
            'categoria-producto' => 'in:Electrónica,Deporte',
            'nombre-producto' => 'min:3|max:100',
            'precio' => 'integer|max:300',
            'unidades' => 'integer|min:1'
        
        ]);
        //Aqui le decimos que variables van a ser las de las que cogemos de nuestro cuestionario
        $nombreProducto = $request->input('nombre-producto');
        $descripcionProducto = $request->input('descripcion-producto');
        $precio = $request->input('precio');
        $unidades = $request->input('unidades');
        $categoriaProducto = $request->input('categoria-producto');

        //escribimos la linea que sera implementada en el csv

        $linea = '"' . $nombreProducto . '";"' . $descripcionProducto . '";"' . $precio . '";"' . $unidades . '";"' . $categoriaProducto . "\"\n";
        //aqui le decimo que la guarde esa linea en el csv, sin borrar el contenido y creando el fichero si no está
        file_put_contents(storage_path('app/productos.csv'), $linea, FILE_APPEND);
        //Aquí estamos escribien el status que sera el mensaje con las unidades que se imprime en el .blade osea el cuestinario y se ejecuta cuando terminamos de hacerlo
       return redirect()->route('create')->with('status', 'Se han guardado' . $unidades . 'numero de unidades');
    }

    // devuelve la vista create
    public function create()
    {
        return view('create');
    }

    //devuelve el home
    public function home()
    {
        return view('home');
    }
}


