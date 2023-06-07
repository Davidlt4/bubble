<?php

namespace App\Http\Controllers;

use App\Models\Receta;
use Illuminate\Http\Request;
use App\Models\Foto;

/**
 * Class RecetaController
 * @package App\Http\Controllers
 */
class RecetaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $busqueda=$request->busqueda;

        $recetas = Receta::where('nombre','LIKE','%'.$busqueda.'%')
        ->orWhere('nombre','LIKE','%'.$busqueda.'%')
        ->latest('id')
        ->paginate();

        // $recetas = Receta::paginate();

        return view('receta.index', compact('recetas'))
            ->with('i', (request()->input('page', 1) - 1) * $recetas->perPage());
    }

    public function index_inicio(Request $request)
    {

        $busqueda=$request->busqueda;

        $recetas = Receta::where('nombre','LIKE','%'.$busqueda.'%')
        ->orWhere('nombre','LIKE','%'.$busqueda.'%')
        ->latest('id')
        ->paginate();

        // $recetas = Receta::paginate();

        return view('receta.index_inicio', compact('recetas'))
            ->with('i', (request()->input('page', 1) - 1) * $recetas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $receta = new Receta();
        return view('receta.create', compact('receta'));
    }

    public function create_usuario()
    {
        $receta = new Receta();
        return view('receta.create_usuario', compact('receta'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if($request['imagen']!=null){

            $file=$request->file('imagen');
            $rutaDestino= 'assets/galeria';
            $filename= time().'-'.$file->getClientOriginalName();
            $guardado=$file->move($rutaDestino,$filename);

            //creamos el objeto foto y lo guardamos en la bd
            $foto= new Foto();
            $foto->nombre=$filename;

            $foto->save();

            $request['id_imagen']=$foto->id;

        }

        request()->validate(Receta::$rules);

        $receta = Receta::create($request->all());

        return redirect()->route('recetas.index')
            ->with('success', 'Receta creada');
        
    }

    public function store_usuario(Request $request)
    {

        if($request['imagen']!=null){

            $file=$request->file('imagen');
            $rutaDestino= 'assets/galeria';
            $filename= time().'-'.$file->getClientOriginalName();
            $guardado=$file->move($rutaDestino,$filename);

            //creamos el objeto foto y lo guardamos en la bd
            $foto= new Foto();
            $foto->nombre=$filename;

            $foto->save();

            $request['id_imagen']=$foto->id;

        }

        request()->validate(Receta::$rules);

        $receta = Receta::create($request->all());

        return redirect()->route('misRecetas')
            ->with('success', 'Receta creada');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $receta = Receta::find($id);

        return view('receta.show', compact('receta'));
    }

    public function show_inicio($id)
    {
        $receta = Receta::find($id);

        return view('receta.show_usuario', compact('receta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $receta = Receta::find($id);

        return view('receta.edit', compact('receta'));
    }

    public function edit_usuario($id)
    {
        $receta = Receta::find($id);

        return view('receta.edit_usuario', compact('receta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Receta $receta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Receta $receta)
    {
        request()->validate(Receta::$rules);

        $receta->update($request->all());

        return redirect()->route('recetas.index')
            ->with('success', 'Receta actualizada');
    }

    public function update_usuario(Request $request, Receta $receta)
    {
        request()->validate(Receta::$rules);

        $receta->update($request->all());

        return redirect()->route('misRecetas')
            ->with('success', 'Receta actualizada');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */

    public function destroy($id)
    {
        $receta = Receta::find($id)->delete();

        return redirect()->route('recetas.index')
            ->with('success', 'Receta borrada');
    }

    public function destroy_usuario($id)
    {
        $receta = Receta::find($id)->delete();

        return redirect()->route('misRecetas')
            ->with('success', 'Receta borrada');
    }

    public static function getAll(){
        return Receta::getAll();
    }
}
