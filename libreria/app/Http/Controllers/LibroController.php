<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use Illuminate\Http\Request;
use App\Models\Categoria;


class LibroController extends Controller
{
   
    public function index()
    {
        $libros = Libro::paginate();
        
        return view('libro.index', compact('libros'))
            ->with('i', (request()->input('page', 1) - 1) * $libros->perPage());
    }

  
    public function create()
    {
        $libro = new Libro();

        $categorias = Categoria::pluck('nombre', 'id'); //obteniendo las categorias

        return view('libro.create', compact('libro', 'categorias'));
    }


    public function store(Request $request)
    {
        request()->validate(Libro::$rules);

        $libro = Libro::create($request->all());

        return redirect()->route('libros.index')
            ->with('success', 'Libro created successfully.');
    }

   
    public function show($id)
    {
        $libro = Libro::find($id);

        return view('libro.show', compact('libro'));
    }


    public function edit($id)
    {
        $libro = Libro::find($id);
        $categorias = Categoria::pluck('nombre', 'id'); //obteniendo las categorias

        return view('libro.edit', compact('libro', 'categorias'));
    }

 
    public function update(Request $request, Libro $libro)
    {
        request()->validate(Libro::$rules);

        $libro->update($request->all());

        return redirect()->route('libros.index')
            ->with('success', 'Libro updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $libro = Libro::find($id)->delete();

        return redirect()->route('libros.index')
            ->with('success', 'Libro deleted successfully');
    }
}
