<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use Exception;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $driver = Driver::find($id);

        return view('screens.driver.show', compact($driver));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {

        try {

            $validated = $request->validate([
                'nombre' => 'required',
                'cedula' => 'required',
                'fecha_nacimiento' => 'required',
                'tipo_licencia' => 'required',
            ]);

            $driver = Driver::find($id);

            $driver->update($validated);
            $driver->saveChanges();

            return redirect('chofer')->with(['success_msg'=>'Actualizado correctamente']);

          //return view('screens.bill.index', ['$bills'=>Bill::all(), ]);
           
            
        } catch (Exception $e) {

            return redirect('chofer')->with(['error_msg' => $e->getMessage()]);
            //return view('screens.bill.index', ['$bills'=>Bill::all(), 'error_msg' => $e->getMessage()]);
        }
        
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
