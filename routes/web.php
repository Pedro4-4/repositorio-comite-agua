<?php

use App\Http\Controllers\SectorController;
use App\Http\Controllers\ProfileController; //ruta anterior de clientes 
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PrecioController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LecturaController;
use App\Http\Controllers\ContadorController;
use App\Http\Controllers\GastoController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\PagoController;

use App\Models\Cliente;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Profiler\Profile;





Route::middleware('auth')->group(function () {
    // Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
  
    //RUTAS PERFIL
    // Route::get('/clientes', [ClienteController::class, 'getClientes'])->name('cliente.users');
    Route::get('/clientes', [ClienteController::class, 'index'])->name('cliente.index');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit'); // esta ruta esta ligada a los otros index
    Route::get('/cliente', [ClienteController::class, 'create'])->name('cliente.create');
    Route::post('/cliente', [ClienteController::class, 'store'])->name('cliente.store');
    Route::get('/cliente/{id}', [ClienteController::class, 'edit2'])->name('cliente.edit2');
    Route::patch('/cliente', [ClienteController::class, 'update'])->name('cliente.update');
    Route::delete('/cliente_delete/{id}', [ClienteController::class, 'destroy'])->name('cliente.destroy');
    Route::get('/cliente_mostrar/{id}', [ClienteController::class, 'show'])->name('cliente.show'); //le puse un nombre diferente a la ruta para que no sea parecida u ejecute la otra


    //RUTAS SECTOR
    Route::get('/sectores', [SectorController::class, 'index'])->name('sector.index');
    Route::get('/sector', [SectorController::class, 'create'])->name('sector.create');
    Route::post('/sector', [SectorController::class, 'store'])->name('sector.store');
    Route::get('/sector/{id}', [SectorController::class, 'edit'])->name('sector.edit');
    // Route::patch('/sector/{id}', [SectorController::class, 'update'])->name('sector.update'); Segunda forma de hacer el update
    Route::patch('/sector', [SectorController::class, 'update'])->name('sector.update');
    Route::delete('/sector_delete/{id}', [SectorController::class, 'destroy'])->name('sector.destroy');

    //RUTAS PRECIO
    Route::get('/precios', [PrecioController::class, 'index'])->name('precio.index');
    Route::get('/precio', [PrecioController::class, 'create'])->name('precio.create');
    Route::post('/precio', [PrecioController::class, 'store'])->name('precio.store');
    Route::patch('/precio', [PrecioController::class, 'update'])->name('precio.update');
    Route::delete('/precio_delete/{id}', [PrecioController::class, 'destroy'])->name('precio.destroy');
    Route::get('/precio_mostrar/{id}', [PrecioController::class, 'show'])->name('precio.show'); //le puse un nombre diferente a la ruta para que no sea parecida u ejecute la otra
    
    //RUTAS LECTURA
    Route::get('/lecturas', [LecturaController::class, 'index'])->name('lectura.index');
    Route::get('/lectura', [LecturaController::class, 'create'])->name('lectura.create');
    Route::get('/lectura_create', [LecturaController::class, 'create'])->name('lectura.create2'); //segundo create 
    Route::get('/lectura/{id}', [LecturaController::class, 'edit'])->name('lectura.edit');
    Route::post('/lectura', [LecturaController::class, 'store'])->name('lectura.store');
    Route::patch('/lectura', [LecturaController::class, 'update'])->name('lectura.update');
    Route::delete('/lectura_delete/{id}', [LecturaController::class, 'destroy'])->name('lectura.destroy');
    Route::get('/lectura_mostrar/{id}', [LecturaController::class, 'show'])->name('lectura.show'); //le puse un nombre diferente a la ruta para que no sea parecida u ejecute la otra
    Route::get('/lectura_ultima/{id}', [LecturaController::class, 'getUltima'])->name('lectura.ultima');
    Route::get('/imprimir_recibo_cobro/{id}', [LecturaController::class, 'getReciboCobro'])->name('lectura.cobro'); //recibo cobro
    Route::get('/imprimir_recibo_pago/{id}', [LecturaController::class, 'getReciboPago'])->name('lectura.pago'); //recibo pago
    

    
    //RUTAS CONTADOR 
    Route::get('/contadores', [ContadorController::class, 'index'])->name('contador.index');
    Route::get('/contador', [ContadorController::class, 'create'])->name('contador.create');
    Route::get('/contador/{id}', [ContadorController::class, 'edit'])->name('contador.edit');
    Route::post('/contador', [ContadorController::class, 'store'])->name('contador.store');
    Route::patch('/contador', [ContadorController::class, 'update'])->name('contador.update');
    Route::delete('/contador_delete/{id}', [ContadorController::class, 'destroy'])->name('contador.destroy');
    Route::get('/contador_mostrar/{id}', [ContadorController::class, 'show'])->name('contador.show'); //le puse un nombre diferente a la ruta para que no sea parecida u ejecute la otra
    Route::get('/get_contadores/{id}', [ContadorController::class, 'getOptionsContadores']);

    //RUTAS GASTO
    Route::get('/gastos', [GastoController::class, 'index'])->name('gasto.index');
    Route::get('/gasto', [GastoController::class, 'create'])->name('gasto.create');
    Route::post('/gasto', [GastoController::class, 'store'])->name('gasto.store');
    Route::patch('/gasto', [GastoController::class, 'update'])->name('gasto.update');
    Route::delete('/gasto_delete/{id}', [GastoController::class, 'destroy'])->name('gasto.destroy');
    Route::get('/gasto_mostrar/{id}', [GastoController::class, 'show'])->name('gasto.show'); //le puse un nombre diferente a la ruta para que no sea parecida u ejecute la otra
    
    //RUTAS REPORTES
    Route::get('/report', [ReporteController::class, 'index'])->name('reporte.index');
    Route::get('/report-financieros', [ReporteController::class, 'getReporteFinanciero'])->name('reporte.financiero');
    Route::get('/report-consumos', [ReporteController::class, 'getReporteConsumo'])->name('reporte.consumo');
    Route::post('/report-consumos', [ReporteController::class, 'postReporteConsumo'])->name('reporte.consumo');
    Route::get('/report-usuarios', [ReporteController::class, 'getReporteUsuario'])->name('reporte.usuario');
    Route::get('/report-morosos', [ReporteController::class, 'getReporteMoroso'])->name('reporte.moroso');

    //RUTAS PAGOS
    Route::get('/pago/{id}', [PagoController::class, 'index'])->name('pago.index');
    Route::post('/pago/{id}', [PagoController::class, 'registrar'])->name('pago.registrar');

});

require __DIR__.'/auth.php';

