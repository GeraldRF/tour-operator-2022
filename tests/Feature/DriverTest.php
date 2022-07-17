<?php

namespace Tests\Feature;
use App\Models\Driver;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class DriverTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;
    
    /** @test */
    public function el_sistema_puede_crear_un_conductor()
    {
        //crear conductor
        $driver = Driver::factory()->create([
            'nombre' => 'Juan',
            'cedula' => '123456789',
            'fecha_nacimiento' => '2020-07-08',
            'tipo_licencia' => 'A',
        ]);
        //verificar que el conductor se creo correctamente
        $this->assertEquals('Juan', $driver->nombre);
        $this->assertEquals('123456789', $driver->cedula);
        $this->assertEquals('2020-07-08', $driver->fecha_nacimiento);
        $this->assertEquals('A', $driver->tipo_licencia);
    }

    /** @test */
    public function el_sistema_puede_editar_un_conductor_de_la_db()
    {
        //crear conductor
        $driver = Driver::factory()->create([
            'nombre' => 'Juan',
            'cedula' => '123456789',
            'fecha_nacimiento' => '2020-07-08',
            'tipo_licencia' => 'A',
        ]);

        $response = $this->get('chofer/'.$driver->id.'/edit');

       $response->assertStatus(200)->assertSee($driver->nombre);

        //editar conductor
        $driver->nombre = 'Alan';
        $driver->cedula = '987654321';
        $driver->fecha_nacimiento = '2020-07-09';
        $driver->tipo_licencia = 'B';
     
        $this->put('chofer/'.$driver->id, $driver->toArray());


        $response = $this->get('chofer');

        $response->assertStatus(200)->assertSee($driver->nombre);

    }

    /** @test */
    public function el_sistema_puede_eliminar_un_conductor()
    {
        //crear conductor
        $driver = Driver::factory()->create([
            'nombre' => 'Juan',
            'cedula' => '123456789',
            'fecha_nacimiento' => '2020-07-08',
            'tipo_licencia' => 'A',
        ]);
        //eliminar conductor
        $driver->delete();
        //verificar que el conductor se elimino correctamente
        $this->assertNull($driver->fresh());
    }

    /** @test */
    //mostrar conductor en consola
    public function el_sistema_puede_mostrar_datos_de_un_conductor()
    {
        //crear conductor
        $driver = Driver::factory()->create([
            'nombre' => 'Juan',
            'cedula' => '123456789',
            'fecha_nacimiento' => '2020-07-08',
            'tipo_licencia' => 'A',
        ]);
        //mostrar datos del conductor
        $this->assertDatabaseHas('drivers', ['nombre' => 'Juan']);
    }

}