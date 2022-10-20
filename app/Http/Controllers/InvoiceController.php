<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
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
            
        return view('invoice.index', compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
        $invoices = DB::table('detail_invoices')
        ->join('invoices', 'detail_invoices.invoice_id', '=', 'invoices.id')
        ->join('products', 'detail_invoices.product_id', '=', 'products.id')
        ->join('item_types','products.itemtype_id','=','item_types.id')
        ->join('customers', 'invoices.id', '=', 'customers.id')
        ->select('detail_invoices.invoice_id','detail_invoices.product_id', 'detail_invoices.quantity',
        'customers.CompanyName', 'customers.id','products.id', 'products.description', 'products.price','item_types.item_type')
        ->get();
        
        return view('invoice.create', compact('invoices'));
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

        DB::table('invoices')
        ->insert([
            'customer_id'=>$request->customer_id,
            'subject'=>$request->subject,
            'dari'=>$request->dari,
        ]);

        return redirect()->route('invoices.index')->with('status','Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $invoices = DB::table('detail_invoices')
        ->join('invoices', 'detail_invoices.invoice_id', '=', 'invoices.id')
        ->join('products', 'detail_invoices.product_id', '=', 'products.id')
        ->join('item_types','products.itemtype_id','=','item_types.id')
        ->join('customers', 'invoices.id', '=', 'customers.id')
        ->where('detail_invoices.invoice_id', $id)
        ->get();

        $total = DB::table('detail_invoices')
        ->join('invoices', 'detail_invoices.invoice_id', '=', 'invoices.id')
        ->join('products', 'detail_invoices.product_id', '=', 'products.id')
        ->join('item_types','products.itemtype_id','=','item_types.id')
        ->join('customers', 'invoices.id', '=', 'customers.id')
        ->where('detail_invoices.invoice_id', $id)
        ->select('detail_invoices.total_payments')
        ->sum('total_payments');

        
        return view('invoice.show', compact('invoices','total'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $invoices = DB::table('detail_invoices')
        ->join('invoices', 'detail_invoices.invoice_id', '=', 'invoices.id')
        ->join('products', 'detail_invoices.product_id', '=', 'products.id')
        ->join('item_types','products.itemtype_id','=','item_types.id')
        ->join('customers', 'invoices.id', '=', 'customers.id')
        ->where('detail_invoices.invoice_id', $id)
        ->get();

        $total = DB::table('detail_invoices')
        ->join('invoices', 'detail_invoices.invoice_id', '=', 'invoices.id')
        ->join('products', 'detail_invoices.product_id', '=', 'products.id')
        ->join('item_types','products.itemtype_id','=','item_types.id')
        ->join('customers', 'invoices.id', '=', 'customers.id')
        ->where('detail_invoices.invoice_id', $id)
        ->select('detail_invoices.total_payments')
        ->sum('total_payments');

        
        return view('invoice.edit', compact('invoices','total'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $invoice = Invoice::find($id);
        $invoice->delete();
        return redirect()->back()->with(['success' => 'Data telah dihapus']);
    }
}
