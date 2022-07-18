<?php
namespace Tests\Feature;
use App\Models\Service;
use App\Models\Supplier;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ServiceTest extends TestCase
{
    use RefreshDatabase;
   
    /**
     * A basic feature test example.
     *
     * @return void
     */
   /** @test */
  public function el_sistema_puede_crear_un_servicio_en_la_bd()
  {
   Supplier::factory(5)->create();

   $service = Service::factory()->make();

   $this->post('servicio', $service->toArray());

   $this->assertDatabaseHas('services', $service->toArray());
     
  }

/** @test */
 public function el_sistema_puede_editar_una_reservacion_de_la_bd()
 {
   Supplier::factory()->create();
   $service = Service::factory()->create();
    

    $response = $this->get('servicio/'.$service->id.'/edit');

   $response->assertStatus(200)->assertSee($service->nombre);

    //editar servicio
    $service->nombre = 'Alan';
    $service->costo = '9000';
    
 
    $this->put('servicio/'.$service->id, $service->toArray());

    $response->assertSessionHas('success_msg', 'Actualizado correctamente');

    $response = $this->get('servicio');

    $response->assertStatus(200)->assertSee([$service->nombre,$service->apellidos]);


 }

/** @test */
public function el_sistema_puede_eliminar_una_reservacion()
{
   Supplier::factory()->create();
   $service = Service::factory(3)->create();
   
   $response = $this->delete('servicio/'.$service[1]->id);

   $response->assertSessionHas('success_msg', 'Se elimino correctamente');

   $this->assertDatabaseMissing('services', ['id' => $service[1]->id]);
  
}

/** @test */
public function el_sistema_puede_mostrar_los_servicios_de_la_bd()
{
   
   Supplier::factory()->create();

   Service::factory(3)->create();

   $response = $this->get('servicio');

   $response->assertStatus(200)->assertSee(Service::all()->random()); 

  
}


/** @test */
public function el_sistema_puede_mostrar_los_servicios_a_realizar_por_dia()
{
   //FALTA FECHA EN SERVICES
   $Servicio= Service::factory(4)->create();
   $ServicioMostrar=Service::find($Servicio[0]->id);
   
   
   $this->assertEquals($ServicioMostrar->id,$Servicio[0]->id);
  
}



}