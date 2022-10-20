<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\DetailInvoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetailInvoiceController extends Controller
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
     * @param  \App\Models\DetailInvoice  $detailInvoice
     * @return \Illuminate\Http\Response
     */
    public function show(DetailInvoice $detailInvoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DetailInvoice  $detailInvoice
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        // $detailinvoice = DB::table('detail-invoices')->find($id);
        // $idnow = $detailinvoice = DB::table('detail_invoices')
        // ->join('invoices', 'detail_invoices.invoice_id', '=', 'invoices.id')
        // ->where('detail_invoices.id', $id)
        // ->select('product_id')->get();

        $detailinvoice = DB::table('detail_invoices')
        ->join('invoices', 'detail_invoices.invoice_id', '=', 'invoices.id')
        ->join('products', 'detail_invoices.product_id', '=', 'products.id')
        ->join('item_types','products.itemtype_id','=','item_types.id')
        ->join('customers', 'invoices.id', '=', 'customers.id')
        ->where('detail_invoices.invoice_id', $id )
        ->get();

        


    
        return response()->json([
            'status'=> 200,
            'detailinvoice'=> $detailinvoice,
        ]);

    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DetailInvoice  $detailInvoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DetailInvoice $detailInvoice)
    {
        //

        $id = $request->input('id');
        $product_id = $request->input('product_id');
        $detail = DB::table('detail_invoices')
              ->where('invoice_id', $id)
              ->where('product_id', $product_id)
              ->update([
                'quantity' => $request->quantity,
                

              ]); 

        return redirect()->route('invoices.index')->with('status','Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DetailInvoice  $detailInvoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(DetailInvoice $detailInvoice)
    {
        //
    }
}
