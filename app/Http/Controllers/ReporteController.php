<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reporte;

class ReporteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $reportes = Reporte::orderBy('id_reporte', 'ASC')->get();
        $reportes = Reporte::where('visible', 1)->orderBy('created_at', 'DESC')->get();
        return $reportes;
        // $empresas = Empresa::orderBy('codigo', 'ASC')
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // printf($request->titulo);
        $reporte = new Reporte();
        $reporte->titulo = $request->titulo;
        $reporte->contenido = $request->contenido;
        $reporte->visible = 1;
        $reporte->autor = $request->autor;
        if ($request->autor_correo_electronico != '') {
            $reporte->autor_correo_electronico = $request->autor_correo_electronico;
            $reporte->notificar = 1;
        }else{
            $reporte->notificar = 0;
        }
        if($reporte){
            $reporte->save();
            return response()->json(['success'=>true]);
        }else{
            return response()->json(['success'=>false]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
