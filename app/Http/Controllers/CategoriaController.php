<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

/**
 * Class CategoriaController
 * @package App\Http\Controllers
 */
class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $busqueda=$request->busqueda;

        $categorias = Categoria::where('nombre','LIKE','%'.$busqueda.'%')
        ->orWhere('nombre','LIKE','%'.$busqueda.'%')
        ->latest('id')
        ->paginate();
        // $categorias = Categoria::paginate();

        return view('categoria.index', compact('categorias'))
            ->with('i', (request()->input('page', 1) - 1) * $categorias->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoria = new Categoria();
        return view('categoria.create', compact('categoria'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categorias=Categoria::all();
        foreach($categorias as $cat){
            if($cat->nombre==$request['nombre']){
                return redirect()->route('categorias.create')
                ->with('success', 'Esta categoría ya existe');
            }
        }

        $this->validate($request,[
            'nombre' => 'required|string|max:60|regex:/[A-Za-z]+$/'
        ]);
        
        // request()->validate(Categoria::$rules);

        $categoria = Categoria::create($request->all());

        return redirect()->route('categorias.index')
            ->with('success', 'Categoria creada.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categoria = Categoria::find($id);

        return view('categoria.show', compact('categoria'));
    }

    public function verCategoria($id){

        $categoria = Categoria::find($id);
        return view('categoria.ver_categoria', compact('categoria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoria = Categoria::find($id);

        return view('categoria.edit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Categoria $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categoria $categoria)
    {
        request()->validate(Categoria::$rules);

        $categoria->update($request->all());

        return redirect()->route('categorias.index')
            ->with('success', 'Categoria actualizada');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $categoria = Categoria::find($id)->delete();

        return redirect()->route('categorias.index')
            ->with('success', 'Categoria borrada');
    }

    public static function getAll(){
        return Categoria::getAll();
    }
}
