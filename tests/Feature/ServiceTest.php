<?php
namespace Tests\Feature;
use App\Models\Service;
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
  public function el_sistema_puede_crear_un_servicio()
  {
      $Nombre = new Service(['Nombre' => 'ViajePlaya']);

      $this->assertEquals('ViajePlaya', $Nombre ->Nombre);
     
  }

/** @test */
 public function el_sistema_puede_editar_una_reservacion()
 {
    
  $Service = Service::factory(3)->create();
  $Service = Service::find(1);
  $NombreAModificar=$Service->Nombre;
  $this->assertEquals($NombreAModificar,$Service->Nombre);

  $Service->Nombre = 'ViajaMar';
  $Service->save();

  $Service = Service::find(1);

   $this->assertEquals('ViajaMar', $Service ->Nombre);


 }

/** @test */
public function el_sistema_puede_eliminar_una_reservacion()
{
   $Service = Service::factory(3)->create();
  
   $Service=Service::find(1);
   $Service->delete();
   $this->assertDatabaseMissing('services', ['id' => '1']);
  
}

/** @test */
public function el_sistema_puede_mostrar_los_servicios()
{
   $Servicio= Service::factory(4)->create();
   $ServicioMostrar=Service::find($Servicio[0]->id);
   
   
   $this->assertEquals($ServicioMostrar->id,$Servicio[0]->id);
  
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