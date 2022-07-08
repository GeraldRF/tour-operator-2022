<?php

namespace Tests\Feature;
use App\Models\Client;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ClientTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
   /** @test */
   public function el_sistema_puede_crear_un_cliente()
   {
    $Client = new Client(['Cedula' => '503200102']);

    $this->assertEquals('503200102', $Client ->Cedula);
      
   }
 
 /** @test */
  public function el_sistema_puede_editar_un_cliente()
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
 public function el_sistema_puede_eliminar_un_cliente()
 {
    $Cliente = Client::factory(3)->create();
   
    $Cliente=Client::find(1);
    $Cliente->delete();
    $this->assertDatabaseMissing('clients', ['id' => '1']);
   
 }
}
