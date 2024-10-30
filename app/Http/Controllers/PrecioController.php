<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Precio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PrecioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $precios = Precio::get();
        return view('precio.index', ['precios' => $precios]);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('precio.create');
        }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        Precio::create([
            'descripcion' => $request->descripcion,
            'monto' => $request->monto,
            'responsable' => Auth::user()->id,
        ]);
        return redirect('/precios');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $precio = Precio::find($id);

        // Verificar si el precio fue encontrado
        if (!$precio) {
            return redirect('/precios')->with('error', 'precio no encontrado.');
        }

        // Devolver la vista con el precio encontrado
        return view('precio.show', compact('precio'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $precio = precio::find($id);
        return view('precio.edit', ['precio' => $precio]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
    //    dd( Auth::user());
   
        $precio = Precio::find($request->id);
        $precio->descripcion = $request->descripcion;
        $precio->monto = $request->monto;        
        $precio->save();

        return redirect('/precios');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         //
        DB::beginTransaction(); //aqui se apertura la transaccion 
        try{
            $precio = Precio::find($id);      
            // Verificar si el precio fue encontrado
            if (!$precio) {
                return response()->json([ 'errors' =>  'El precio no ha sido encontrado' ]); ;
            }        
            $precio->delete();
            DB::commit(); //aqui ya se hacen los cambios en la base de datos
            return 'exito';

        }catch(\Exception $e){
            DB::rollback(); // esto se utiliza para revertir la transaccion 
            throw $e;
        }
     
    }
}
