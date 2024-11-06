<?php

namespace App\Http\Controllers;
use App\Models\Gasto;
use Illuminate\Http\Request;

class Gastocontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        //
        $gastos = Gasto::get();
        return view('gasto.index', ['gastos' => $gastos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('gasto.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        Gasto::create([
        'descripcion' => $request->descripcion,
        'monto' => $request->monto,
        'referencia' => $request->referencia,
        ]);
        return redirect('/gastos');

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
