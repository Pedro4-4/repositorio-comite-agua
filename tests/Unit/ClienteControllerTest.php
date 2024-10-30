<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Cliente;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ClienteControllerTest extends TestCase
{
    use RefreshDatabase; // Refresca la base de datos después de cada prueba

    public function testStoreNuevoCliente()
    {
        // Simular una solicitud POST al método store con los datos del formulario
        $response = $this->post('/clientes', [
            'nombre' => 'Juan',
            'apellido' => 'Perez',
            'dpi' => '1234567890101',
            'telefono' => '55555555',
            'direccion' => 'Calle Falsa 123',
            'observacion' => 'Nuevo cliente',
            'sector' => 1, // Asegúrate de que haya sectores en la base de datos
        ]);

        // Verificar que la redirección fue correcta
        $response->assertRedirect('/clientes');

        // Verificar que el cliente fue creado en la base de datos
        $this->assertDatabaseHas('clientes', [
            'nombre' => 'Juan',
            'apellido' => 'Perez',
            'dpi' => '1234567890101',
            'telefono' => '55555555',
            'direccion' => 'Calle Falsa 123',
            'observacion' => 'Nuevo cliente',
        ]);
    }

    public function testStoreClienteConDatosInvalidos()
    {
        // Simular una solicitud POST con datos inválidos
        $response = $this->post('/clientes', [
            'nombre' => '',  // El nombre no puede estar vacío
            'apellido' => '',
            'dpi' => '123', // DPI inválido
            'telefono' => '',
            'direccion' => '',
            'observacion' => '',
            'sector' => 1,
        ]);

        // Verificar que se redirige con errores de validación
        $response->assertSessionHasErrors(['nombre', 'apellido', 'dpi', 'telefono']);
    }
}
