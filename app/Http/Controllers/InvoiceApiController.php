<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class InvoiceApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $invoices = DB::table('invoices')
        ->join('customers', 'invoices.customer_id', '=', 'customers.id')
        ->select('invoices.*', 'customers.CompanyName')
        ->get();

        return response()->json([
            'status'=> 200,
            'invoices'=> $invoices,
        ]);
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
        //
        $invoice = DB::table('detail_invoices')
        ->join('invoices', 'detail_invoices.invoice_id', '=', 'invoices.id')
        ->join('products', 'detail_invoices.product_id', '=', 'products.id')
        ->join('item_types','products.itemtype_id','=','item_types.id')
        ->join('customers', 'invoices.id', '=', 'customers.id')
        ->where('detail_invoices.invoice_id', $id )
        ->get();

        


    
        return response()->json([
            'status'=> 200,
            'invoice'=> $invoice,
        ]);
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
