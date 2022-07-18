<?php

namespace App\Http\Controllers;

use App\Models\BillReport;
use Exception;
use Illuminate\Http\Request;

class BillReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $billReports = BillReport::all();

        return view('screens.bill_report.index', ['billReports' => $billReports]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('screens.bill_report.create');
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
                'rango_fechas' => 'required',
                'supplier_id' => 'required',
                'bill_id' => 'required',
                'vehicle_id' => 'required',
                'reservation_id' => 'required'
            ]);

            BillReport::create($validated);

            return redirect('reporte-gastos')->with(['success_msg' => 'Creado correctamente']);
            
        } catch (Exception $e) {

            return redirect('reporte-gastos')->with(['error_msg' => $e->getMessage()]);
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
