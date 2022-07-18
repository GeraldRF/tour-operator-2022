<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Exception;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservation = Reservation::all();

        return view('screens.reservation.index', ['reservation' => $reservation]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('screens.reservation.create');
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
                'cliente_id' => 'required',
                'supplier_id' => 'required',
                'numero_vuelo' => 'required',
                'cantidad_pasajeros' => 'required',
                'fecha_hora' => 'required',
                'tarifa_servicio' => 'required',
                'tipo_pago' => 'required',
                'observaciones' => 'required'
            ]);

            Reservation::create($validated);

            return redirect('reservacion')->with(['success_msg'=>'Creado correctamente']);

           
            
        } catch (Exception $e) {

            return redirect('reservacion')->with(['error_msg' => $e->getMessage()]);
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
        $reservation = Reservation::find($id);

        return view('screens.reservation.edit', ['reservation' => $reservation]);
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
                'cliente_id' => 'required',
                'supplier_id' => 'required',
                'numero_vuelo' => 'required',
                'cantidad_pasajeros' => 'required',
                'fecha_hora' => 'required',
                'tarifa_servicio' => 'required',
                'tipo_pago' => 'required',
                'observaciones' => 'required'
            ]);

            $reservation = Reservation::find($id);

            $reservation->update($validated);
           
            return redirect('reservacion')->with(['success_msg' => 'Actualizado correctamente']);


        } catch (Exception $e) {

            return redirect('reservacion')->with(['error_msg' => $e->getMessage()]);
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

            $reservation = Reservation::find($id);
            $reservation->delete();

            return redirect('reservacion')->with(['success_msg' => 'Se elimino correctamente']);
        } catch (Exception $e) {

            return redirect('reservacion')->with(['error_msg' => $e->getMessage()]);
        }
    }
}
