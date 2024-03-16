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
        $libro->fecha_publicacion = new \DateTime(str_replace('/', '-', $request->fecha_publicacion));
        $libro->calificacion = $request->calificacion;
        $libro->save();

        // Redirigir a la página de éxito o mostrar un mensaje
        return response()->json(Libro::all());
    }

    public function destroy($id)
    {
        $libro = Libro::find($id);

        if ($libro) {
            $libro->delete();
            return response()->json(['message'=> 'Eliminado con exito'], 200);
        }

        return response()->json(['message'=> 'No se ha encontrado el libro'],400);
    }

    public function update(Request $request, $id){
        $libro = Libro::find($id);
        if (!$libro) {
            return response()->json(['message'=> 'Bood dont find'], 404);
        }

        // Recorrer todos los campos del request
        foreach ($request->all() as $campo => $valor) {
            $libro->$campo = $valor;
        }

        $libro->save();
        return response()->json(['message'=> 'Book Updated'], 200);
    }
}
