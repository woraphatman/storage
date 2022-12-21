<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $date = $request->get('date');
        $search = $request->get('search');
        $data['products'] = Product::where('product_list', 'like', '%' . $search . '%')
            ->orWhere('product_type', 'like', '%' . $search . '%')
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        if ($date != null) {
            $data['products'] = Product::where('product_list', 'like', '%' . $search . '%')->whereDate('created_at', '=', $date)
            ->orWhere('product_type', 'like', '%' . $search . '%')->whereDate('created_at', '=', $date)
            ->orderBy('created_at', 'desc')
            ->paginate(5);
        }
        return view('products.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'list' => 'required',
            'type' => 'required',
            'detail' => 'required',
            'code' => 'required',
            'category' => 'required',
        ]);
        $product = new Product();
        $this->save($product, $request);
        return redirect()
            ->route('products.index')
            ->with('success', 'Product has been created successfully ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'list' => 'required',
            'type' => 'required',
            'detail' => 'required',
            'code' => 'required',
            'category' => 'required',
        ]);
        $product = Product::find($id);
        $this->save($product, $request);
        return redirect()
            ->route('products.index')
            ->with('success', 'Product has been updated successfully ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()
            ->route('products.index')
            ->with('success', 'Product has been deleted successfully ');
    }
    private function save($product, $request)
    {
        $product->product_list = $request->list;
        $product->product_type = $request->type;
        $product->product_detail = $request->detail;
        $product->product_code = $request->code;
        $product->product_category = $request->category;
        $product->save();
    }
}
