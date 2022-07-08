<?php

namespace Tests\Feature;
use App\Models\Driver;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DriverTest extends TestCase
{
    use RefreshDatabase;
    
    /** @test */
    public function el_sistema_puede_crear_un_conductor()
    {
        //crear conductor
        $driver = Driver::factory()->create([
            'nombre' => 'Juan',
            'cedula' => '123456789',
            'fechaNacimiento' => '2020-07-08',
            'tipoLicencia' => 'A',
        ]);
        //verificar que el conductor se creo correctamente
        $this->assertEquals('Juan', $driver->nombre);
        $this->assertEquals('123456789', $driver->cedula);
        $this->assertEquals('2020-07-08', $driver->fechaNacimiento);
        $this->assertEquals('A', $driver->tipoLicencia);
    }

    /** @test */
    public function el_sistema_puede_editar_un_conductor()
    {
        //crear conductor
        $driver = Driver::factory()->create([
            'nombre' => 'Juan',
            'cedula' => '123456789',
            'fechaNacimiento' => '2020-07-08',
            'tipoLicencia' => 'A',
        ]);
        //editar conductor
        $driver->nombre = 'Pedro';
        $driver->cedula = '987654321';
        $driver->fechaNacimiento = '2020-07-09';
        $driver->tipoLicencia = 'B';
        $driver->save();
        //verificar que el conductor se edito correctamente
        $this->assertEquals('Pedro', $driver->nombre);
        $this->assertEquals('987654321', $driver->cedula);
        $this->assertEquals('2020-07-09', $driver->fechaNacimiento);
        $this->assertEquals('B', $driver->tipoLicencia);
    }

    /** @test */
    public function el_sistema_puede_eliminar_un_conductor()
    {
        //crear conductor
        $driver = Driver::factory()->create([
            'nombre' => 'Juan',
            'cedula' => '123456789',
            'fechaNacimiento' => '2020-07-08',
            'tipoLicencia' => 'A',
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
            'fechaNacimiento' => '2020-07-08',
            'tipoLicencia' => 'A',
        ]);
        //mostrar datos del conductor
        $this->assertDatabaseHas('drivers', ['nombre' => 'Juan']);
    }

}