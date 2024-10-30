<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User; // Para simular un usuario autenticado
use App\Models\Cliente; // Por si necesitas modelos de prueba

class WebRoutesTest extends TestCase
{
    use RefreshDatabase; // Esto limpia la base de datos entre cada prueba

    /**
     * Probar la ruta principal '/'
     */
    public function testRutaWelcome()
    {
        $response = $this->get('/');

        $response->assertStatus(200); // Verificar que la página cargue correctamente
        $response->assertViewIs('welcome'); // Verificar que la vista correcta se está cargando
    }

    /**
     * Probar la ruta protegida '/dashboard' con un usuario autenticado
     */
    public function testRutaDashboardConAutenticacion()
    {
        // Simular un usuario autenticado
        $user = User::factory()->create();
        
        // Hacer una solicitud GET a la ruta 'dashboard' autenticado
        $response = $this->actingAs($user)->get('/dashboard');

        $response->assertStatus(200); // Verificar que responde correctamente
        $response->assertViewIs('dashboard'); // Verificar que carga la vista correcta
    }

    /**
     * Probar la creación de un cliente (POST)
     */
    public function testRutaStoreCliente()
    {
        // Simular un usuario autenticado
        $user = User::factory()->create();

        // Datos de ejemplo para crear un nuevo cliente
        $data = [
            'nombre' => 'Juan',
            'apellido' => 'Pérez',
            'telefono' => '55555555',
            'dpi' => '1234567890101',
            'direccion' => 'Calle Falsa 123'
        ];

        // Simular una solicitud POST para crear un cliente
        $response = $this->actingAs($user)->post('/cliente', $data);

        // Verificar que el cliente fue creado y redirigido correctamente
        $response->assertStatus(302); // Verifica redirección
        $response->assertRedirect('/clientes'); // Verifica que redirige correctamente

        // Verificar que el cliente se guardó en la base de datos
        $this->assertDatabaseHas('clientes', ['nombre' => 'Juan']);
    }

    /**
     * Probar la edición de un cliente (PATCH)
     */
    public function testRutaUpdateCliente()
    {
        // Simular un usuario autenticado
        $user = User::factory()->create();

        // Crear un cliente de prueba
        $cliente = Cliente::factory()->create([
            'nombre' => 'Pedro',
            'apellido' => 'López',
        ]);

        // Datos actualizados del cliente
        $data = [
            'id' => $cliente->id,
            'nombre' => 'Pedro',
            'apellido' => 'González',
            'telefono' => '77777777',
            'dpi' => '1234567890101',
            'direccion' => 'Calle Actualizada 456'
        ];

        // Simular una solicitud PATCH para actualizar el cliente
        $response = $this->actingAs($user)->patch('/cliente', $data);

        // Verificar que se redirige correctamente
        $response->assertStatus(302);
        $response->assertRedirect('/clientes'); // Verificar redirección

        // Verificar que los cambios se reflejan en la base de datos
        $this->assertDatabaseHas('clientes', ['apellido' => 'González']);
    }

    /**
     * Probar la eliminación de un cliente (DELETE)
     */
    public function testRutaDestroyCliente()
    {
        // Simular un usuario autenticado
        $user = User::factory()->create();

        // Crear un cliente de prueba
        $cliente = Cliente::factory()->create();

        // Simular una solicitud DELETE para eliminar el cliente
        $response = $this->actingAs($user)->delete("/cliente_delete/{$cliente->id}");

        // Verificar que se redirige correctamente
        $response->assertStatus(302);
        $response->assertRedirect('/clientes');

        // Verificar que el cliente fue eliminado de la base de datos
        $this->assertDatabaseMissing('clientes', ['id' => $cliente->id]);
    }
}
