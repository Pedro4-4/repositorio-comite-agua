<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Lectura;
use App\Models\Contador;
use App\Models\Precio;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LecturaTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Prueba la relación 'contador' de la Lectura.
     *
     * @return void
     */
    public function testRelacionContador()
    {
        // Crear un contador de prueba
        $contador = Contador::factory()->create();

        // Crear una lectura relacionada con el contador
        $lectura = Lectura::factory()->create(['contador_id' => $contador->id]);

        // Verificar que la relación funcione correctamente
        $this->assertInstanceOf(Contador::class, $lectura->contador);
        $this->assertEquals($contador->id, $lectura->contador->id);
    }

    /**
     * Prueba la relación 'precio' de la Lectura.
     *
     * @return void
     */
    public function testRelacionPrecio()
    {
        // Crear un precio de prueba
        $precio = Precio::factory()->create();

        // Crear una lectura relacionada con el precio
        $lectura = Lectura::factory()->create(['precio_id' => $precio->id]);

        // Verificar que la relación funcione correctamente
        $this->assertInstanceOf(Precio::class, $lectura->precio);
        $this->assertEquals($precio->id, $lectura->precio->id);
    }
}
