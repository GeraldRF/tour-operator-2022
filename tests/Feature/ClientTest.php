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
   public function el_sistema_puede_crear_un_cliente_en_la_bd()
   {
    
      $client = Client::factory()->make();

      $this->post('cliente', $client->toArray());

      $this->assertDatabaseHas('clients', $client->toArray());
      
   }
 

/** @test */
public function el_sistema_puede_editar_un_cliente_de_la_db()
{
    //crear conductor
    $client = Client::factory()->create();
    

    $response = $this->get('cliente/'.$client->id.'/edit');

   $response->assertStatus(200)->assertSee($client->nombre);

    //editar cliente
    $client->nombre = 'Alan';
    $client->apellidos = 'Ramirez';
    
 
    $this->put('cliente/'.$client->id, $client->toArray());

    $response->assertSessionHas('success_msg', 'Actualizado correctamente');

    $response = $this->get('cliente');

    $response->assertStatus(200)->assertSee([$client->nombre,$client->apellidos]);
 
 
  }
 
 /** @test */
 public function el_sistema_puede_eliminar_un_cliente_de_la_bd()
 {
   $clients = Client::factory(3)->create();
   
   $response = $this->delete('cliente/'.$clients[1]->id);

   $response->assertSessionHas('success_msg', 'Se elimino correctamente');

   $this->assertDatabaseMissing('clients', ['id' => $clients[1]->id]);
   
 }

/** @test */
public function el_sistema_puede_mostrar_los_clientes_()
{
   $Cliente= Client::factory(4)->create();
   $ClienteMostrar=Client::find($Cliente[0]->id);
   
   
   $this->assertEquals($ClienteMostrar->id,$Cliente[0]->id);
  
}






}
