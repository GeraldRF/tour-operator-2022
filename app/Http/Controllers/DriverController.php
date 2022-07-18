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
        $drivers = Driver::all();

        return view('screens.driver.index', ['drivers' => $drivers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('screens.driver.create');
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
                'nombre' => 'required',
                'cedula' => 'required',
                'fecha_nacimiento' => 'required',
                'tipo_licencia' => 'required'
            ]);

            Driver::create($validated);

            return redirect('chofer')->with(['success_msg'=>'Creado correctamente']);

               
        } catch (Exception $e) {

            return redirect('chofer')->with(['error_msg' => $e->getMessage()]);
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $driver = Driver::find($id);

        return view('screens.driver.edit', ['driver' => $driver]);
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
                'nombre' => 'required',
                'cedula' => 'required',
                'fecha_nacimiento' => 'required',
                'tipo_licencia' => 'required',
            ]);

            $driver = Driver::find($id);

            $driver->update($validated);
           
            return redirect('chofer')->with(['success_msg' => 'Actualizado correctamente']);


        } catch (Exception $e) {

            return redirect('chofer')->with(['error_msg' => $e->getMessage()]);
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

            $driver = Driver::find($id);
            $driver->delete();

            return redirect('chofer')->with(['success_msg' => 'Se elimino correctamente']);
        } catch (Exception $e) {

            return redirect('chofer')->with(['error_msg' => $e->getMessage()]);
        }
    }
}
