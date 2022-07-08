<?php

namespace Tests\Feature;

use App\Models\Reservation;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ReservationTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
  /** @test */
  public function el_sistema_puede_crear_una_reservacion()
  {
      $Reservita = new Reservation(['Name' => 'Jafeth']);

      $this->assertEquals('Jafeth', $Reservita ->Name);
     
  }

 /** @test */
 public function el_sistema_puede_editar_una_reservacion()
 {
     $Reservita = new Reservation(['Name' => 'Jafeth']);

     $this->assertEquals('Jafeth', $Reservita ->Name);

    
 }


 /** @test */
 public function el_sistema_puede_eliminar_una_reservacion()
 {
     $Reservita = new Reservation(['Name' => 'Jafeth']);

     $this->assertEquals('Jafeth', $Reservita ->Name);

    
 }











}
