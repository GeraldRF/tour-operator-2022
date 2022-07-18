<?php

namespace Tests\Feature;
use App\Models\Client;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class ClientTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;
    /**
     * A basic feature test example.
     *
     * @return void
     */
   /** @test */
   public function el_sistema_puede_crear_un_cliente_de_la_bd()
   {
    $Client = new Client(['Cedula' => '503200102']);

    $this->assertEquals('503200102', $Client ->Cedula);
      
   }
 
 /** @test */
  public function el_sistema_puede_editar_un_cliente_de_la_bd()
  {
     
     $Cliente = Client::factory(3)->create();
     $Cliente = Client::find(1);
     $CedulaAModificar=$Cliente->Cedula;
     $this->assertEquals($CedulaAModificar,$Cliente->Cedula);
 
     $Cliente->Cedula = '111111000';
     $Cliente->save();
 
     $Cliente = Client::find(1);
 
      $this->assertEquals('111111000', $Cliente ->Cedula);
 
 
  }
 
 /** @test */
 public function el_sistema_puede_eliminar_un_cliente_de_la_db()
 {
   $clients = Client::factory(3)->create();
   
   $response = $this->delete('cliente/'.$clients[1]->id);

   $response->assertSessionHas('success_msg', 'Se elimino correctamente');

   $this->assertDatabaseMissing('clients', ['id' => $clients[1]->id]);
   
 }

/** @test */
public function el_sistema_puede_mostrar_los_clientes_de_la_bd()
{
   $Cliente= Client::factory(4)->create();
   $ClienteMostrar=Client::find($Cliente[0]->id);
   
   
   $this->assertEquals($ClienteMostrar->id,$Cliente[0]->id);
  
}






}
