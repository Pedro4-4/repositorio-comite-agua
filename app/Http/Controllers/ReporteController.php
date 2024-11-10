<?php

namespace App\Http\Controllers;

use App\Models\Lectura;
use App\Models\Gasto;
use Illuminate\Http\Request;
use Carbon\Carbon;
class ReporteController extends Controller
{
    
    public function index()
    {
       
        return view('reporte.index');
    }

    // Reporte financiero
    public function getReporteFinanciero(){

        return view('reporte.financiero');
    }

    // Reporte consumo
    public function getReporteConsumo(){

        return view('reporte.consumo');
    }

    // Reporte usuarios
    public function getReporteUsuario(){

        return view('reporte.usuario');
    }
    
    // Reporte morosos
    public function getReporteMoroso(){

        return view('reporte.moroso');
    }


    public function showReporteFinanciero(Request $request)
{
    $fechaSeleccionada = $request->get('fecha');

    // Lógica para convertir la fecha y filtrar por el mes o día en tu base de datos
    // Supongamos que solo estás filtrando por el mes:

    $ingresos = Lectura::whereMonth('fecha', Carbon::parse($fechaSeleccionada)->month)->get();
    $gastos = Gasto::whereMonth('fecha', Carbon::parse($fechaSeleccionada)->month)->get();

    $totalIngresos = $ingresos->sum('ingreso_total');
    $totalGastos = $gastos->sum('monto');
    $balanceNeto = $totalIngresos - $totalGastos;

    if ($request->ajax()) {
        return view('partials.reporte-financiero', compact('ingresos', 'gastos', 'totalIngresos', 'totalGastos', 'balanceNeto'))->render();
    }

    return view('reporte-financiero', compact('ingresos', 'gastos', 'totalIngresos', 'totalGastos', 'balanceNeto'));
}

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
