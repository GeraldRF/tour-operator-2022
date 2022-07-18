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
     

     //

   }

    /** @test */
    public function el_sistema_puede_editar_un_proveedor()
    {
        //crear proveedor
        $supplier = Supplier::factory()->create([
            'cedula_juridica' => '123456789',
            'nombre' => 'Proveedor 1',
            'tipo_empresa' => 'S.A.',
            'porcentaje_comision' => '10',
        ]);
        //editar proveedor
        $supplier->cedula_juridica = '987654321';
        $supplier->nombre = 'Proveedor 2';
        $supplier->tipo_empresa = 'S.C.';
        $supplier->porcentaje_comision = '20';
        $supplier->save();
        //verificar que el proveedor se edito correctamente
        $this->assertEquals('987654321', $supplier->cedula_juridica);
        $this->assertEquals('Proveedor 2', $supplier->nombre);
        $this->assertEquals('S.C.', $supplier->tipo_empresa);
        $this->assertEquals('20', $supplier->porcentaje_comision);
    }

    /** @test */

    public function el_sistema_puede_eliminar_un_proveedor()
    {
        //crear proveedor
        $supplier = Supplier::factory()->create([
            'cedula_juridica' => '123456789',
            'nombre' => 'Proveedor 1',
            'tipo_empresa' => 'S.A.',
            'porcentaje_comision' => '10',
        ]);
        //eliminar proveedor
        $supplier->delete();
        //verificar que el proveedor se elimino correctamente
        $this->assertDatabaseMissing('suppliers', ['cedula_juridica' => '123456789']);
    }

    /** @test */

    //mostrar proveedors por consola
    public function el_sistema_puede_mostrar_datos_de_un_proveedor()
    {
        //Mostrar datos de un proveedor
        $supplier = Supplier::factory()->create([
            'cedula_juridica' => '123456789',
            'nombre' => 'Proveedor 1',
            'tipo_empresa' => 'S.A.',
            'porcentaje_comision' => '10',
        ]);
        //verificar que el proveedor se muestra por consola
        $this->assertDatabaseHas('suppliers', ['cedula_juridica' => '123456789']);
    }


}
