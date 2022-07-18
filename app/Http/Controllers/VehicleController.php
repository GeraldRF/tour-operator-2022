<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Exception;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\DocBlock\Tags\Var_;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicles = Vehicle::all();

        return view('screens.vehicle.index', ['vehicles' => $vehicles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('screens.vehicle.create');
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
                'placa' => 'required',
                'marca' => 'required',
                'modelo' => 'required',
                'capacidad' => 'required'
            ]);

            Vehicle::create($validated);

            return redirect('vehiculo')->with(['success_msg' => 'Creado correctamente']);
        } catch (Exception $e) {

            return redirect('vehiculo')->with(['error_msg' => $e->getMessage()]);
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vehicle = Vehicle::find($id);

        return view('screens.vehicle.edit', ['vehicle' => $vehicle]);
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
                'placa' => 'required',
                'marca' => 'required',
                'modelo' => 'required',
                'capacidad' => 'required',
            ]);

            $vehicle = Vehicle::find($id);

            $vehicle->update($validated);
           
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

            $vehicle = Vehicle::find($id);
            $vehicle->delete();

            return redirect('vehiculo')->with(['success_msg' => 'Se elimino correctamente']);
        } catch (Exception $e) {

            return redirect('vehiculo')->with(['error_msg' => $e->getMessage()]);
        }
    }
}
