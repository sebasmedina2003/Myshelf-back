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
        if (! Libro::isUniqueTitle($request->titulo)) {
            return response()->json(['message' => 'Title is already in use'], 400);
        }

        // Guardar el libro
        $libro = new Libro;
        $libro->titulo = $request->titulo;
        $libro->imagen = $request->imagen;
        $libro->genero = $request->genero;
        $libro->autores = $request->autores;
        $libro->fecha_publicacion = new \DateTime($request->fecha_publicacion);
        $libro->calificacion = $request->calificacion;
        $libro->save();

        // Redirigir a la página de éxito o mostrar un mensaje
        return response()->json(Libro::all());
    }
}
