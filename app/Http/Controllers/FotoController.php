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
    public function index()
    {
        $fotos = Foto::paginate();

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

            return redirect()->route('fotos.create')
                ->with('success', 'Foto subida correctamente a la galería.');

        }else{
            
            return redirect()->route('fotos.create')
            ->with('success','Por favor seleccione una foto');
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
            ->with('success', 'Foto updated successfully');
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
            ->with('success', 'Foto deleted successfully');
    }

    public static function cargarGaleria(){
        $fotos=[];
        foreach (glob("assets/galeria/*") as $foto) {
            array_push($fotos,$foto);
        }
        return $fotos;
    }
    
}
