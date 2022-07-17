<?php

namespace Tests\Feature;
use App\Models\Supplier;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SupplierUnitTest extends TestCase
{
    use refreshDatabase;

   /** @test */
    public function el_sistema_puede_crear_un_proveedor()
    {
        //crear proveedor
        $supplier = Supplier::factory()->create([
            'cedulaJuridica' => '123456789',
            'nombre' => 'Proveedor 1',
            'tipoEmpresa' => 'S.A.',
            'porcentajeComision' => '10',
        ]);

        //verificar que el proveedor se creo correctamente
        $this->assertEquals('123456789', $supplier->cedulaJuridica);
        $this->assertEquals('Proveedor 1', $supplier->nombre);
        $this->assertEquals('S.A.', $supplier->tipoEmpresa);
        $this->assertEquals('10', $supplier->porcentajeComision);
    }

    /** @test */
    public function el_sistema_puede_editar_un_proveedor()
    {
        //crear proveedor
        $supplier = Supplier::factory()->create([
            'cedulaJuridica' => '123456789',
            'nombre' => 'Proveedor 1',
            'tipoEmpresa' => 'S.A.',
            'porcentajeComision' => '10',
        ]);
        //editar proveedor
        $supplier->cedulaJuridica = '987654321';
        $supplier->nombre = 'Proveedor 2';
        $supplier->tipoEmpresa = 'S.C.';
        $supplier->porcentajeComision = '20';
        $supplier->save();
        //verificar que el proveedor se edito correctamente
        $this->assertEquals('987654321', $supplier->cedulaJuridica);
        $this->assertEquals('Proveedor 2', $supplier->nombre);
        $this->assertEquals('S.C.', $supplier->tipoEmpresa);
        $this->assertEquals('20', $supplier->porcentajeComision);
    }

    /** @test */

    public function el_sistema_puede_eliminar_un_proveedor()
    {
        //crear proveedor
        $supplier = Supplier::factory()->create([
            'cedulaJuridica' => '123456789',
            'nombre' => 'Proveedor 1',
            'tipoEmpresa' => 'S.A.',
            'porcentajeComision' => '10',
        ]);
        //eliminar proveedor
        $supplier->delete();
        //verificar que el proveedor se elimino correctamente
        $this->assertDatabaseMissing('suppliers', ['cedulaJuridica' => '123456789']);
    }

    /** @test */

    //mostrar proveedors por consola
    public function el_sistema_puede_mostrar_datos_de_un_proveedor()
    {
        //Mostrar datos de un proveedor
        $supplier = Supplier::factory()->create([
            'cedulaJuridica' => '123456789',
            'nombre' => 'Proveedor 1',
            'tipoEmpresa' => 'S.A.',
            'porcentajeComision' => '10',
        ]);
        //verificar que el proveedor se muestra por consola
        $this->assertDatabaseHas('suppliers', ['cedulaJuridica' => '123456789']);
    }


}
