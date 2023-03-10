<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Product;

use Illuminate\Http\Request;
use Redirect, Response;

class ProductController extends Controller

{

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    function __construct()

    {

        /* $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index', 'show']]);

        $this->middleware('permission:product-create', ['only' => ['create', 'store']]);

        $this->middleware('permission:product-edit', ['only' => ['edit', 'update']]);

        $this->middleware('permission:product-delete', ['only' => ['destroy']]); */
    }

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index()
    {
        if (request()->ajax()) {
            return datatables()->of(Product::select('*'))
                ->addColumn('action', 'DataTables.action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('products/list');
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
        $productId = $request->product_id;
        $product   =   Product::updateOrCreate(
            ['id' => $productId],
            ['title' => $request->title, 'product_code' => $request->product_code, 'description' => $request->description]
        );
        return Response::json($product);
    }



    /**

     * Display the specified resource.

     *

     * @param  \App\Product  $product

     * @return \Illuminate\Http\Response

     */

    public function show(Product $product)

    {

        return view('products.show', compact('product'));
    }



    /**

     * Show the form for editing the specified resource.

     *

     * @param  \App\Product  $product

     * @return \Illuminate\Http\Response

     */

    public function edit($id)
    {
        $where = array('id' => $id);
        $product  = Product::where($where)->first();

        return Response::json($product);
    }



    /**

     * Update the specified resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @param  \App\Product  $product

     * @return \Illuminate\Http\Response

     */

    public function update(Request $request, Product $product)

    {

        request()->validate([

            'name' => 'required',

            'detail' => 'required',

        ]);



        $product->update($request->all());



        return redirect()->route('products.index')

            ->with('success', 'Product updated successfully');
    }



    /**

     * Remove the specified resource from storage.

     *

     * @param  \App\Product  $product

     * @return \Illuminate\Http\Response

     */

    public function destroy($id)
    {
        $product = Product::where('id', $id)->delete();

        return Response::json($product);
    }
}
