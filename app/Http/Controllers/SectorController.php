<?php

namespace App\Http\Controllers;

use App\Models\Sector;
use Illuminate\Http\Request;

class SectorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sectores = Sector::get();
        return view('sector.index', ['sectores' => $sectores]);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sector.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd( $request->nombre)
        Sector::create([
            'nombre' => $request->nombre,
        ]);
        return redirect('/sectores');

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
        $sector = sector::find($id);
        return view('sector.edit', ['sector' => $sector]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        // dd($request->id);
        $sector = Sector::find($request ->id);
        $sector->nombre = $request->nombre;
        $sector->save();

        return redirect('/sectores');
    }

    /**
     * Remove the specified resource from storage.
     */

    

    public function destroy(string $id)
    {
        //
        // dd($id);
        $sector = Sector::find($id);
      
          // Verificar si el sector fue encontrado
          if (!$sector) {
              return redirect('/sectores')->with('error', 'Sector no encontrado.');
          }
      
          // Eliminar el sector
          $sector->delete();
      
          // Redirigir con un mensaje de éxito
          return redirect('/sectores')->with('success', 'Sector eliminado correctamente.');
     

    }
}
