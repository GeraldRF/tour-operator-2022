<?php

namespace Tests\Feature;
use App\Models\Vehicle;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class VehicleTest extends TestCase
{
    use refreshDatabase;
    
/** @test */
    public function el_sistema_puede_crear_un_vehiculo()
    {
        //crear vehiculo
        $vehicle = Vehicle::factory()->create([
            'placa' => 'ABC123',
            'marca' => 'Toyota',
            'modelo' => 'Corolla',
            'capacidad' => '5',
        ]);

        //verificar que el vehiculo se creo correctamente
        $this->assertEquals('ABC123', $vehicle->placa);
        
       
    }

    /** @test */
    public function el_sistema_puede_editar_un_vehiculo()
    {
        //crear vehiculo
        $vehicle = Vehicle::factory()->create([
            'placa' => 'ABC123',
            'marca' => 'Toyota',
            'modelo' => 'Corolla',
            'capacidad' => '5',
        ]);
        //editar vehiculo
        $vehicle->placa = 'ABC456';
        $vehicle->marca = 'Honda';
        $vehicle->modelo = 'Accord';
        $vehicle->capacidad = '7';
        $vehicle->save();
        //verificar que el vehiculo se edito correctamente
        $this->assertEquals('ABC456', $vehicle->placa);
        $this->assertEquals('Honda', $vehicle->marca);
        $this->assertEquals('Accord', $vehicle->modelo);
        $this->assertEquals('7', $vehicle->capacidad);
    }

    /** @test */
    public function el_sistema_puede_eliminar_un_vehiculo()
    {
        //crear vehiculo
        $vehicle = Vehicle::factory()->create([
            'placa' => 'ABC123',
            'marca' => 'Toyota',
            'modelo' => 'Corolla',
            'capacidad' => '5',
        ]);
        //eliminar vehiculo
        $vehicle->delete();
        //verificar que el vehiculo se elimino correctamente
        $this->assertDatabaseMissing('vehicles', ['id' => $vehicle->id]);
    }

    /** @test */
    public function el_sistema_puede_mostrar_datos_de_un_vehiculo()
    {
        //Mostrar datos de un vehiculo
        $vehicle = Vehicle::factory()->create([
            'placa' => 'ABC123',
            'marca' => 'Toyota',
            'modelo' => 'Corolla',
            'capacidad' => '5',
        ]);
        //verificar que el vehiculo se muestra por consola

        $this->assertDatabaseHas('vehicles', ['placa' => 'ABC123']);
       
      
    }
   
}
