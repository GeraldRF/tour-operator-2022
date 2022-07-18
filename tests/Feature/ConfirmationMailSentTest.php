<?php

namespace Tests\Feature;

use App\Models\Client;
use App\Models\Supplier;
use App\Models\ConfirmationEmailsSent;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class ConfirmationMailSentTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    /** @test */
    public function el_sistema_puede_crear_reporte_de_gastos()
    {

        $supplier = Supplier::factory()->create();

        $client = Client::factory()->create();


        $confirmationMailSent = ConfirmationEmailsSent::factory()->create(['supplier_id' => $supplier->id, 'client_id' => $client->id]);

        $this->assertEquals($confirmationMailSent->id, ConfirmationEmailsSent::find($confirmationMailSent->id)->id);
    }
}
