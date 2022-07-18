<?php

namespace Tests\Feature;

use App\Models\Supplier;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class SupplierTest extends TestCase
{
    use refreshDatabase;
    use WithoutMiddleware;

    /** @test */
    public function el_sistema_puede_almacenar_proveedores_en_la_db()
    {

        $supplier = Supplier::factory()->make();

        $this->post('proveedor', $supplier->toArray());

        $this->assertDatabaseHas('suppliers', $supplier->toArray());
    }

    /** @test */
    public function el_sistema_puede_editar_un_proveedor_de_la_db()
    {
        $supplier = Supplier::factory()->create();

        $response = $this->get('proveedor/' . $supplier->id . '/edit');

        $response->assertStatus(200)->assertSee($supplier->nombre);

        //editar conductor
        $supplier->nombre = 'Coca cola';
        $supplier->tipo_empresa = 'Bebidas';

        $this->put('proveedor/' . $supplier->id, $supplier->toArray());

        $response->assertSessionHas('success_msg', 'Actualizado correctamente');

        $response = $this->get('proveedor');

        $response->assertStatus(200)->assertSee($supplier->nombre);
    }

    /** @test */

    public function el_sistema_puede_eliminar_un_proveedor_de_la_db()
    {
        $supplier = Supplier::factory(3)->create();

        $response = $this->delete('proveedor/' . $supplier[1]->id);

        $response->assertSessionHas('success_msg', 'Se elimino correctamente');

        $this->assertDatabaseMissing('suppliers', ['id' => $supplier[1]->id]);
    }

    /** @test */

    //mostrar proveedors por consola
    public function el_sistema_puede_mostrar_todos_los_proveedores_de_la_db()
    {
        Supplier::factory(7)->create();

        $response = $this->get('proveedor');

        $response->assertStatus(200)->assertSee(Supplier::all()->random());
    }
}
