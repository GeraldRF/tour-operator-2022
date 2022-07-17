<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bill;
use Exception;
use Illuminate\Queue\Jobs\RedisJob;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bills = Bill::all();

        return view('screens.bill.index', ['bills' => $bills]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('screens.bill.create');
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
                'fecha' => 'required',
                'tipo_gasto' => 'required',
                'descripcion' => 'required',
                'vehicle_id' => 'required',
                'monto' => 'required',
            ]);

            Bill::create($validated);

            return redirect('gastos')->with(['success_msg'=>'Creado correctamente']);

          //return view('screens.bill.index', ['$bills'=>Bill::all(), ]);
           
            
        } catch (Exception $e) {

            return redirect('gastos')->with(['error_msg' => $e->getMessage()]);
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
        return view('screens.bill.show');
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
