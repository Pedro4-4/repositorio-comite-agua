<?php

namespace App\Http\Controllers;

use App\Models\Lectura;
use App\Models\Pago;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class PagoController extends Controller

{
    /**
     * Muestra la vista de pagos para una lectura específica.
     */
    public function index($id)
    {
        $lectura = Lectura::find($id);
    $cliente = $lectura->cliente; 

    return view('pago.index', [
        'lectura' => $lectura,
        'cliente' => $lectura->contador->cliente
    ]);
    }

    /**
     * Registra un pago para una lectura específica.
     */
    public function registrar($id, Request $request)
    {
        // Validar los datos del request
        $request->validate([
            'abono' => 'required|numeric|min:0', // Validar que abono sea un número positivo
            'nota' => 'nullable|string' // Nota opcional, pero si está, debe ser string
        ]);

        // Buscar la lectura por ID
        $lectura = Lectura::find($id);
        
        $monto = $request->abono;
        $monto_deuda = Lectura::where('contador_id', $lectura->contador->id)->where('estado', 0)->sum('saldo');

        if($monto_deuda > 0 && $monto > 0 && $request->abono > 0 ){
            $lecturas = Lectura::where('contador_id', $lectura->contador->id)->where('estado', 0)->orderBy('id','desc')->get();
            
            foreach ($lecturas as $lecturaR) {
                Log::debug('Este es un mensaje de log en Laravel', [
                    'lectura_id' => $lecturaR->id,
                    'monto' => $monto
                ]);
                if($lecturaR->saldo > 0){
                    if($monto >= $lecturaR->saldo){
                        $lecturaR->estado = 1;
                        $monto = $monto - $lecturaR->saldo;
                        $lecturaR->abono = $lecturaR->saldo;
                        $lecturaR->saldo = 0;
                        $lecturaR->save();
                        Log::debug('devbig', [                      
                            'monto ddd' => $monto
                        ]);
                    }else{
                        $lecturaR->saldo = $lecturaR->saldo - $monto;
                        $lecturaR->abono = $monto;
                        $lecturaR->estado = 0;
                        $lecturaR->save();
                        $monto = 0;
                        break;
                    }                 
                }
            }
        }   
        return view('lectura.recibo-pago', [
                'lectura' => $lectura,
                'monto_deuda' => $monto_deuda - $lectura->total ,
                'saldo_actual_fijo' => $monto_deuda  ,
                'abono' => $request->abono,
            ]);   
        // return redirect('/lecturas');
    }
}
