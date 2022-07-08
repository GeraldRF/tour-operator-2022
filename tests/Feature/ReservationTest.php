<?php

namespace Tests\Feature;

use App\Models\Reservation;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ReservationTest extends TestCase
{
    use RefreshDatabase;
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
    $Reservita = Reservation::factory(1)->create();

    $Reservita = Reservation::find(1);
    $NameActual=$Reservita->Name;
    $this->assertEquals($NameActual,$Reservita->Name);

    $Reservita->Name = 'Fabricio';
    $Reservita->save();

    $Reservita = Reservation::find(1);

     $this->assertEquals('Fabricio', $Reservita ->Name);


 }

/** @test */
public function el_sistema_puede_eliminar_una_reservacion()
{
   $Reservita = Reservation::factory(3)->create();
  
   $Reservita=Reservation::find(1);
   $Reservita->delete();
   $this->assertDatabaseMissing('reservations', ['id' => '1']);
  

}


}
