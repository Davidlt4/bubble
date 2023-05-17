<?php

namespace App\Http\Controllers;

use App\Models\Imagene;
use Illuminate\Http\Request;

/**
 * Class ImageneController
 * @package App\Http\Controllers
 */
class ImageneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $imagenes = Imagene::paginate();

        return view('imagenes.index', compact('imagenes'))
            ->with('i', (request()->input('page', 1) - 1) * $imagenes->perPage());
    }

    public static function all(){
        $imagenes = Imagene::paginate();
        return compact('imagenes');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $imagenes = new Imagene();
        return view('imagenes.create', compact('imagenes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Imagene::$rules);

        $imagenes = Imagene::create($request->all());

        return redirect()->route('imagenes.index')
            ->with('success', 'Imagene created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $imagenes = Imagene::find($id);

        return view('imagenes.show', compact('imagenes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $imagenes = Imagene::find($id);

        return view('imagenes.edit', compact('imagenes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Imagene $imagene
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Imagene $imagenes)
    {
        request()->validate(Imagene::$rules);

        $imagenes->update($request->all());

        return redirect()->route('imagenes.index')
            ->with('success', 'Imagene updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $imagenes = Imagene::find($id)->delete();

        return redirect()->route('imagenes.index')
            ->with('success', 'Imagene deleted successfully');
    }

    public static function cargarGaleria(){
        $fotos=[];
        foreach (glob("assets/galeria/*") as $foto) {
            array_push($fotos,$foto);
        }
        return $fotos;
    }
   
}
