<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Exception;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::all();

        return view('screens.client.index', ['clients' => $clients]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('screens.client.create');
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
                'apellidos' => 'required',
                'cedula' => 'required',
                'fecha_nacimiento' => 'required',
                'correo_electronico' => 'required',
            ]);

            Client::create($validated);

            return redirect('clientes')->with(['success_msg'=>'Creado correctamente']);

          //return view('screens.bill.index', ['$bills'=>Bill::all(), ]);
           
            
        } catch (Exception $e) {

            return redirect('clientes')->with(['error_msg' => $e->getMessage()]);
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
        //

        $client = Client::find($id);

        return view('screens.client.edit', ['client' => $client]);



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
                'apellidos' => 'required',
                'cedula' => 'required',
                'fecha_nacimiento' => 'required',
                'correo_electronico' => 'required',
        
            ]);

            $client = Client::find($id);

            $client->update($validated);
           
            return redirect('cliente')->with(['success_msg' => 'Actualizado correctamente']);


        } catch (Exception $e) {

            return redirect('cliente')->with(['error_msg' => $e->getMessage()]);
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

            $client = Client::find($id);
            $client->delete();

            return redirect('cliente')->with(['success_msg' => 'Se elimino correctamente']);
        } catch (Exception $e) {

            return redirect('cliente')->with(['error_msg' => $e->getMessage()]);
        }
    }
}
