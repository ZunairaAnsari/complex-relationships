<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Product;
use App\Models\Record;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class recordController extends Controller
{
    public function index()
{
    // $records = DB::table('records')
    //               ->join('clients', 'records.client_id', '=', 'clients.id')
    //               ->join('products', 'records.product_id', '=', 'products.id')
    //               ->select('records.*', 'clients.name as client_name', 'products.product_name')
    //               ->get();

    // return view('index', compact('records'));

    $records = Record::with(['client', 'product'])->get();

    return view('index', compact('records'));
}


    public function create()
    {
        $clients = Client::all();
        $products = Product::all();
        return view('createLink', compact('clients', 'products'));
    }

    // public function store(Request $request)
    // {
    //     // $request->validate([
    //     //     'client_id' => 'required|exists:clients,id',
    //     //     'product_id' => 'required|exists:products,id',
    //     //     'quantity' => 'required|integer|min:1',
    //     // ]);

    //     // // Attach the product to the client with quantity
    //     // $client = Client::find($request->client_id);
    //     // $client->products()->attach($request->product_id, ['quantity' => $request->quantity]);

    //     $request->validate([
    //         'client_id' => 'required|exists:clients,id',
    //         'product_id' => 'required|exists:products,id',
    //         'quantity' => 'required|integer|min:1',
    //     ]);

    //     // Enable query logging
    //     DB::enableQueryLog();

    //     // Attach the product to the client with quantity
    //     $client = Client::find($request->client_id);
    //     $client->products()->attach($request->product_id, ['quantity' => $request->quantity]);

    //     // Dump the query log
    //     dd(DB::getQueryLog());

    //     return redirect()->route('records.create')->with('success', 'Client linked to product successfully.');
    // }


    public function store(Request $request)
{
    $request->validate([
        'client_id' => 'required|exists:clients,id',
        'product_id' => 'required|exists:products,id',
        'quantity' => 'required|integer|min:1',
    ]);

    
    Record::create([
        'client_id' => $request->client_id,
        'product_id' => $request->product_id,
        'quantity' => $request->quantity,
    ]);

    return redirect()->route('records.create')->with('success', 'Client linked to product successfully.');
}

}
