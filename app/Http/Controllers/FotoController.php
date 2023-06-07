<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use Illuminate\Http\Request;

/**
 * Class FotoController
 * @package App\Http\Controllers
 */
class FotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $busqueda=$request->busqueda;

        $fotos = Foto::where('nombre','LIKE','%'.$busqueda.'%')
        ->orWhere('nombre','LIKE','%'.$busqueda.'%')
        ->latest('id')
        ->paginate();
        // $fotos = Foto::paginate();

        return view('foto.index', compact('fotos'))
            ->with('i', (request()->input('page', 1) - 1) * $fotos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $foto = new Foto();
        return view('foto.create', compact('foto'));
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

            $request['nombre']=$filename;
            
            request()->validate(Foto::$rules);

            $foto = Foto::create($request->all());

            return redirect()->route('subirfoto')->with('success','Foto subida correctamente');

        }else{  
            return redirect()->route('subirfoto')->with('success','Por favor seleccione una foto');
        }

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $foto = Foto::find($id);

        return view('foto.show', compact('foto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $foto = Foto::find($id);

        return view('foto.edit', compact('foto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Foto $foto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Foto $foto)
    {
        request()->validate(Foto::$rules);

        $foto->update($request->all());

        return redirect()->route('fotos.index')
            ->with('success', 'Foto actualizada');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $foto = Foto::find($id)->delete();

        return redirect()->route('fotos.index')
            ->with('success', 'Foto borrada');
    }

    public static function cargarGaleria(){
        $fotos=[];
        foreach (glob("assets/galeria/*") as $foto) {
            array_push($fotos,$foto);
        }
        return $fotos;
    }

    public static function getAll(){
        return Foto::getAll();
    }
    
}
