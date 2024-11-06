<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Sector;
use App\Models\Cliente;
use App\Models\Lectura;
use Illuminate\Http\Request;
class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function index()
    {
        //
        $clientes = Cliente::get();
        return view('profile.index', ['clientes' => $clientes]);

    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {   $sectores = Sector::get();
        return view('profile.create', ['sectores' => $sectores]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        Cliente::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'dpi' => $request->dpi,
            'telefono' => $request->telefono,
            'direccion' => $request->direccion,
            'observacion' => $request->observacion,
            
        ]);
        return redirect('/contador');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $cliente = cliente::find($id);
        $sectores = Sector::get();
        $lecturas = Lectura::where('contador_id', $cliente->contadores->first()->id)->orderBy('id', 'desc')->get();
        // Verificar si el cliente fue encontrado
        if (!$cliente) {
            return redirect('/clientes')->with('error', 'cliente no encontrado.');
        }

        // Devolver la vista con el cliente encontrado
        // return view('profile.show', compact('cliente'));
        return view('profile.show', ['cliente' => $cliente,'sectores' => $sectores, 'lecturas' => $lecturas ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit2(string $id)
    {
        //
        $cliente = cliente::find($id);
        $sectores = Sector::get();
        return view('profile.edit2', ['cliente' => $cliente,'sectores' => $sectores]);

    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,)
    {
        //
        // dd($request->id);
        $cliente = Cliente::find($request ->id);
        $cliente->nombre = $request->nombre;
        $cliente->apellido = $request->apellido;
        $cliente->dpi = $request->dpi;
        $cliente->telefono = $request->telefono;
        $cliente->direccion= $request->direccion;
        $cliente->sector_id = $request->sector;
        $cliente->observacion = $request->observacion;
        $cliente->save();

        return redirect('/clientes');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::beginTransaction(); //aqui se apertura la transaccion 
        try{
            $cliente = Cliente::find($id);      
            // Verificar si el cliente fue encontrado
            if (!$cliente) {
                return response()->json([ 'errors' =>  'El cliente no ha sido encontrado' ]); ;
            }        
            $cliente->delete();
            DB::commit(); //aqui ya se hacen los cambios en la base de datos
            return 'exito';

        }catch(\Exception $e){
            DB::rollback(); // esto se utiliza para revertir la transaccion 
            throw $e;
        }
       
    }

    
}
