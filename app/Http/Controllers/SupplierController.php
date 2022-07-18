<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Suppllier;
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
        
        $suppliers = Suppliers::all();

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
            
            Suppllier::create($validated);
            
            return redirect('proveedor')->with(['success_msg'=>'Creado correctamente']);
            
            //return view('screens.bill.index', ['$bills'=>Bill::all(), ]);
            
            
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
