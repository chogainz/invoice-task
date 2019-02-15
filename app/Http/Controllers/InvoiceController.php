<?php

namespace App\Http\Controllers;

use App\Client;
use App\Invoice;
use App\Item;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::all()->where('user_id', Auth::user()->id);

        foreach ($invoices as $key => $value) {
            $invoices[$key]->date = Carbon::parse($invoices[$key]->date)->format('d F Y');

            $diff = Carbon::parse($value['date'])->diffInDays($value['invoice_date']);

            if ($diff === 0) {$dateMessage = ' Today';}
            if ($diff < 0) {$dateMessage = ' Overdue';}
            if ($diff > 1) {$dateMessage = $diff . ' Days';}
            if ($diff === 1) {$dateMessage = $diff . ' Day';}

            $invoices[$key]['days'] = $dateMessage;
            $invoices[$key]->client = Client::get()->where('user_id', Auth::user()->id)->first();

        }

        return view('invoices.index', compact('invoices'));
    }
    public function create()
    {
        $user = Auth::user();
        $clients = Client::all()->where('user_id', $user->id);
        return view('invoices.create', compact('user', 'clients'));
    }
    public function store(Request $request)
    {
        echo 'store';
    }
    public function show($id)
    {
        $invoice = Invoice::get()->where('id', $id)->first();
        $invoice->user = Auth::user();
        $invoice->client = Client::get()->where('user_id', Auth::user()->id)->first();
        $invoice->item = Item::get()->where('invoice_id', $id)->first();

        return view('invoices.show', compact('invoice'));

    }
    public function edit($id)
    {
        echo 'edit';
    }
    public function update(Request $request, $id)
    {

        $invoices = Invoice::get();
        $invoice_id = $invoices->count() > 0 ? $invoices->last()->id + 1 : 1;

        $item = new Item([
            "name_description" => $request['name_description'],
            "quantity" => $request->quantity,
            "unit" => $request->unit,
            "invoice_id" => $invoice_id,
        ]);

        $item->save();

        if (!$request['client_id']) {
            $client = new Client([
                "name" => $request->name,
                "email" => "test@test.com",
                "street" => $request->street,
                "city" => $request->city,
                "postcode" => $request->postcode,
                "country" => $request->country,
                "user_id" => Auth::user()->id,
            ]);
            $client->save();
            $request['client_id'] = Client::get()->where('user_id', Auth::user()->id)->first()->id;
        }

        $invoice = new Invoice([
            'title' => $request['invoice_title'],
            'description' => $request['invoice_description'],
            'purchase_order_number' => $request['purchase_order_number'],
            'invoice_number' => $request['invoice_number'],
            'date' => $request['date'],
            'invoice_date' => $request['invoice_date'],
            'invoice_note' => $request['invoice_note'],
            'status' => 'Draft',
            'invoice_paid' => false,
            'total' => $request['total'],
            'user_id' => $id,
            'client_id' => $request['client_id'],
        ]);

        $invoice->save();
        return redirect('invoices');

    }
    public function destroy($id)
    {
        Item::where('invoice_id', $id)->delete();
        Invoice::where('id', $id)->delete();
        return redirect('invoices');

    }
}
