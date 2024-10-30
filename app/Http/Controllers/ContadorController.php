<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Contador;
use App\Models\Cliente;
use App\Models\Sector;
use App\Models\Precio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContadorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $contadores = Contador::get();
        return view('contador.index', ['contadores' => $contadores]);
    }
    public function getOptionsContadores($id)
    {
        $contadores = Contador::where('cliente_id', $id)
            ->with([
                'lecturas' => function ($query) {
                    $query->orderBy('created_at', 'desc')->limit(1);
                },
                'lecturas_sum'
            ])->get();

        return response()->json($contadores);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //jalar esta consulta cuando se haga el store
        $clientes = Cliente::get();
        $precio = Precio::orderBy('id', 'desc')->first();  //consulta por eso va desc 
        $sectores = Sector::get();
        $ultimoCliente = str_pad(Contador::latest('id')->first()->id + 1, 6, 0, 0);
        // dd( $ultimoCliente);
        return view('contador.create', ['clientes' => $clientes, 'precio' => $precio,  'ultimoCliente' => $ultimoCliente, 'sectores' => $sectores]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $codigo = Contador::latest('id')->first()->id + 1;
        //dd($request->direccion);

        Contador::create([

            'sector_id' => $request->sector,
            'cliente_id' => $request->cliente_id,
            'direccion' => $request->direccion,
            'precio_id' => $request->precio_id,
            'codigo' => $codigo,


        ]);
        return redirect('/contadores');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $contador = Contador::find($id);
        $cliente = Cliente::find($contador->cliente_id);
        $direccion = Contador::find($contador->direccion);
        $precio = Precio::find($contador->precio_id);

        $ultimoCliente = str_pad(Contador::latest('id')->first()->id + 1, 6, 0, 0);
        // Devolver la vista con el contador encontrado
        // return view('contador.show', compact('contador'));
        return view('contador.show', ['contador' => $contador, 'cliente' => $cliente, 'precio' => $precio, 'ultimoCliente' => $ultimoCliente,]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $contador = Contador::find($id);
        $cliente = Cliente::find($contador->cliente_id);
        $precio = Precio::find($contador->precio_id);
        $ultimoCliente = str_pad(Contador::latest('id')->first()->id + 1, 6, 0, 0);
        return view('contador.edit', ['contador' => $contador, 'cliente' => $cliente, 'precio' => $precio, 'ultimoCliente' => $ultimoCliente,]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
        $contador = Contador::find($request->id);
        $cliente = Cliente::find($contador->cliente_id);
        $contador->direccion = $request->direccion;
        $precio = Precio::find($contador->precio_id);
        $ultimoCliente = str_pad(Contador::latest('id')->first()->id + 1, 6, 0, 0);
        // $contador->codigo = $request->codigo;
        $contador->save();

        return redirect('/contadores');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        DB::beginTransaction(); //aqui se apertura la transaccion 
        try {
            $contador = Contador::find($id);
            // Verificar si el contador fue encontrado
            if (!$contador) {
                return response()->json(['errors' =>  'El contador no ha sido encontrado']);;
            }
            $contador->delete();
            DB::commit(); //aqui ya se hacen los cambios en la base de datos
            return 'exito';
        } catch (\Exception $e) {
            DB::rollback(); // esto se utiliza para revertir la transaccion 
            throw $e;
        }
    }
}
