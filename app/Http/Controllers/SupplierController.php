<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use Exception;
use Illuminate\Queue\Jobs\RedisJob;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $suppliers = Supplier::all();

        return view('screens.supplier.index', ['suppliers' => $suppliers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('screens.supplier.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        try {
            
            $validated = $request->validate([
                'cedula_juridica' => 'required',
                'nombre' => 'required',
                'tipo_empresa' => 'required',
                'porcentaje_comision' => 'required',
            ]);
            
            Supplier::create($validated);
            
            return redirect('proveedor')->with(['success_msg'=>'Creado correctamente']);  
            
        } catch (Exception $e) {
            return redirect('proveedor')->with(['error_msg'=>'Error al crear']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        return view('screens.supplier.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $supplier = Supplier::find($id);

        return view('screens.supplier.edit', ['supplier' => $supplier]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        try {

            $validated = $request->validate([
                'cedula_juridica' => 'required',
                'nombre' => 'required',
                'tipo_empresa' => 'required',
                'porcentaje_comision' => 'required',
            ]);

            $supplier = Supplier::find($id);

            $supplier->update($validated);
           
            return redirect('vehiculo')->with(['success_msg' => 'Actualizado correctamente']);


        } catch (Exception $e) {

            return redirect('vehiculo')->with(['error_msg' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {

            $supplier = Supplier::find($id);
            $supplier->delete();

            return redirect('vehiculo')->with(['success_msg' => 'Se elimino correctamente']);
        } catch (Exception $e) {

            return redirect('vehiculo')->with(['error_msg' => $e->getMessage()]);
        }
    }
}
