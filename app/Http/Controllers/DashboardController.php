<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Lectura;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   $clientes = Cliente::count();
        $lecturas = Lectura::whereMonth('created_at', Carbon::now()->month) ->where('estado', 1)
        ->count();
        
        $lecturas2 = Lectura::whereMonth('created_at', Carbon::now()->month) ->where('estado', 0)
        ->count();

        
        // dd($lecturas);
        return view('dashboard', ['clientes' => $clientes, 'lecturas' => $lecturas, 'lecturas2' => $lecturas2,]);
    }

    /**
     * Show the form for creating a new resource.
     */
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
