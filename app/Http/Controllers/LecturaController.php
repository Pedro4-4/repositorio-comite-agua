<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Lectura;
use App\Models\Contador;
use App\Models\Cliente;
use App\Models\Precio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LecturaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $lecturas = Lectura::orderBy('id', 'desc')->get();
        return view('lectura.index', ['lecturas' => $lecturas]);
    }
  


    public function create()
    {
        //
        
        $clientes = Cliente::get();
        $precio = Precio::orderBy('id', 'desc')->first();  //consulta por eso va desc 
        
        
        return view('lectura.create', ['clientes' => $clientes, 'precio' => $precio]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->saldo);
        $lectura = new Lectura;
       
        $lectura->contador_id = $request->contador;
        $lectura->precio_id = $request->precio_id;
        $lectura->lectura_anterior = $request->lectura_anterior;
        $lectura->lectura_actual = $request->lectura_actual;
        $lectura->monto = $request->monto;
        $lectura->canon_mensual = $request->canon_mensual;

        $lectura->saldo = $request->abono >= $request->total ? 0 : $request->total - $request->abono;
        $lectura->abono = $lectura->saldo == 0 ? $request->total : $request->abono;
        $lectura->nota = $request->nota;
        $lectura->estado = $request->tipo_recibo;
        $lectura->total = $request->total;
        $lectura->save();
        $monto_deuda = Lectura::where('contador_id', $request->contador)->where('estado', 0)->sum('saldo');
        $monto = $lectura->saldo == 0 ?  $request->abono - $request->total : 0;
        


        if($monto_deuda > 0 && $monto > 0 && $request->abono > 0 ){
            $lecturas = Lectura::where('contador_id', $request->contador)->where('estado', 0)->orderBy('id','desc')->get();
            
            foreach ($lecturas as $lectura) {
                Log::debug('Este es un mensaje de log en Laravel', [
                    'lectura_id' => $lectura->id,
                    'monto' => $monto
                ]);
                if($lectura->saldo > 0){
                    if($monto >= $lectura->saldo){
                        $lectura->estado = 1;
                        $monto = $monto - $lectura->saldo;
                        $lectura->abono = $lectura->saldo;
                        $lectura->saldo = 0;
                        $lectura->save();
                        Log::debug('devbig', [                      
                            'monto ddd' => $monto
                        ]);
                    }else{
                        $lectura->saldo = $lectura->saldo - $monto;
                        $lectura->abono = $monto;
                        $lectura->estado = 0;
                        $lectura->save();
                        $monto = 0;
                        break;
                    }                 
                }
            }
        }


        

        $lectura = Lectura::find($lectura->id);
        if($lectura->estado == 1){
            return view('lectura.recibo-pago', ['lectura' => $lectura, 'monto_deuda' => $request->saldo]);
        }else{

            return view('lectura.recibo-cobro', ['lectura' => $lectura, 'monto_deuda' => $request->saldo]);
        }
        // return redirect('/lecturas');
    }

    public function getUltima(string $id)
    {
        $lectura = Lectura::where('contador_id', $id)->orderBy('id', 'desc')->first();
        return response()->json($lectura);
    }

    /**
     * Display the specified resource.
     */

    public function getReciboCobro(string $id)
    {   
        $lectura = Lectura::find($id);
        $cliente = $lectura->contador->cliente;
        $monto_deuda = Lectura::where('contador_id', $lectura->contador->id)->where('estado', 0)->sum('saldo');
        
        
     
        return view('lectura.recibo-cobro', ['lectura' => $lectura, 'cliente' => $cliente, 'monto_deuda' => $monto_deuda]);
    
    }
  
    


    public function getReciboPago(string $id)
    {
       
        $lectura = Lectura::find($id);
        $cliente = $lectura->contador->cliente;
        $monto_deuda = Lectura::where('contador_id', $lectura->contador->id)->where('estado', 0)->sum('saldo');

        
        // $contador = $lectura->cliente->contador;
        return view('lectura.recibo-pago', ['lectura' => $lectura, 'cliente' => $cliente, 'monto_deuda' => $monto_deuda]);

    }




    public function show(string $id)
    {
        //
        $lectura = Lectura::find($id);
        $cliente = Cliente::find($lectura->contador->cliente_id);
        $contador = contador::find($lectura->contador->id);
        $precio = Precio::find($contador->precio_id);
        $ultimoCliente = str_pad(Contador::latest('id')->first()->id + 1,6,0,0) ;

        return view('lectura.show', ['cliente' => $cliente, 'lectura' => $lectura, 'contador' => $contador, 'ultimoCliente' => $ultimoCliente, 'precio' => $precio,]);

  

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
        DB::beginTransaction(); //aqui se apertura la transaccion 
        try{
            $lectura = Lectura::find($id);      
            // Verificar si el precio fue encontrado
            if (!$lectura) {
                return response()->json([ 'errors' =>  'El precio no ha sido encontrado' ]); ;
            }        
            $lectura->delete();
            DB::commit(); //aqui ya se hacen los cambios en la base de datos
            return 'exito';

        }catch(\Exception $e){
            DB::rollback(); // esto se utiliza para revertir la transaccion 
          

    }
}
}