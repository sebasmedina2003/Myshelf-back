<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    public function index()
    {
        $libros = Libro::all();
        return response()->json($libros);
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario
        // Redirigir a la página de éxito o mostrar un mensaje
        return $request->titulo;

        /* $request->validate([
            'titulo' => 'required|max:255',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'genero' => 'required|in:novela,ensayo,poesia,ciencia_ficcion',
            'fecha_publicacion' => 'required|date',
            'calificacion' => 'required|numeric|min:0|max:5',
        ]);

        // Guardar el libro
        $libro = new Libro;
        $libro->titulo = $request->titulo;
        $libro->imagen = $request->imagen->store('libros');
        $libro->genero = $request->genero;
        $libro->fecha_publicacion = $request->fecha_publicacion;
        $libro->calificacion = $request->calificacion;
        $libro->save();
        */
    }
}
