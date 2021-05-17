<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;

class InvoicesController extends Controller
{
  public function index()
  {
    $allInvoices = Invoice::all();
    return response()->json($allInvoices);
  }

  public function store(Request $request)
  {
    $invoice = new Invoice();

    $invoice->type = $request->type;
    $invoice->account_name = $request->account_name;
    $invoice->status = $request->status;
    $invoice->currency = $request->currency;
    $invoice->balance = $request->balance;

    $invoice->save();

    return response()->json('success');
  }

  public function show($id)
  {
    $invoice = Invoice::findOrFail($id);

    return response()->json($invoice);
  }
}