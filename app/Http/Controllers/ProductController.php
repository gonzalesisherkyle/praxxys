<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function products()
    {
        return view('product');
    }

    public function view()
    {
       $products = Product::all()->toArray();
       return array_reverse($products);
    }

    public function create()
    {
        return view('create-product');
    }

    public function edit($id)
    {
        return view('edit-product', compact('id'));
    }

    public function show($id)
    {
        $data = Product::where('product_id', $id)->first();
        // $dateTime = \Carbon\Carbon::parse($data->date_and_time);
        return response()->json($data);
    }

    public function updated(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'description' => 'required',
            'date_and_time' => 'required|date',
        ]);

        Product::where('product_id', $request->product_id)->update([
            'name' => $request['name'],
            'category' => $request['category'],
            'description' => $request['description'], 
            'date_and_time' => $request['date_and_time'],
        ]);

        return response()->json(['message' => 'Product updated successfully'], 201);
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'description' => 'required',
            'date_and_time' => 'required|date',
        ]);

        // Create a new product
        $product = new Product;
        $product->name = $request->input('name');
        $product->category = $request->input('category');
        $product->description = $request->input('description');
        $product->date_and_time = $request->input('date_and_time');

        // Save the product to the database
        $product->save();

        return response()->json(['message' => 'Product stored successfully'], 201);
    }

    public function delete($id)
    {
        if($id)
        {
            Product::where('product_id', $id)->delete();
        }

        return redirect()->route('product');
    }
}
