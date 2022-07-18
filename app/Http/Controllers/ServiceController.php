<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Exception;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all();

        return view('screens.service.index', ['services' => $services]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('screens.service.create');
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
                'costo' => 'required',
                'tipo_servicio' => 'required',
                'supplier_id' => 'required',
                
            ]);
            Service::create($validated);

            return redirect('servicio')->with(['success_msg'=>'Creado correctamente']);

          //return view('screens.bill.index', ['$bills'=>Bill::all(), ]);
           
            
        } catch (Exception $e) {

            return redirect('servicio')->with(['error_msg' => $e->getMessage()]);
            //return view('screens.bill.index', ['$bills'=>Bill::all(), 'error_msg' => $e->getMessage()]);
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
        $service = Service::find($id);

        return view('screens.service.edit', ['service' => $service]);
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
                'costo' => 'required',
                'tipo_servicio' => 'required',
                'supplier_id' => 'required',
        
            ]);

            $service = Service::find($id);

            $service->update($validated);
           
            return redirect('servicio')->with(['success_msg' => 'Actualizado correctamente']);


        } catch (Exception $e) {

            return redirect('servicio')->with(['error_msg' => $e->getMessage()]);
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

            $service = Service::find($id);
            $service->delete();

            return redirect('servicio')->with(['success_msg' => 'Se elimino correctamente']);
        } catch (Exception $e) {

            return redirect('servicio')->with(['error_msg' => $e->getMessage()]);
        }
    }
    }

