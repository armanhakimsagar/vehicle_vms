<?php



namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Product;

use Illuminate\Http\Request;

use Yajra\Datatables\Datatables;


class ProductController extends Controller

{

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    function __construct()

    {

        $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index', 'show']]);

        $this->middleware('permission:product-create', ['only' => ['create', 'store']]);

        $this->middleware('permission:product-edit', ['only' => ['edit', 'update']]);

        $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    }

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    // public function index()

    // {

    //     $products = Product::latest()->paginate(5);

    //     return view('products.index', compact('products'))

    //         ->with('i', (request()->input('page', 1) - 1) * 5);


    // }

    public function index(Request $request)

    {

        if ($request->ajax()) {

            $data = Product::latest()->get();

            return Datatables::of($data)

                    ->addIndexColumn()

                    ->addColumn('action', function($row){

                        $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editItem">Edit</a>';

   

                        $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteItem">Delete</a>';

                         return $btn;


                        return $btn;

                    })

                    ->rawColumns(['action'])

                    ->make(true);

        }

      

        return view('products.product');

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

        request()->validate([

            'name' => 'required',

            'detail' => 'required',

        ]);



        Product::create($request->all());



        return redirect()->route('products.index')

            ->with('success', 'Product created successfully.');
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

    public function edit(Product $product)

    {

        return view('products.edit', compact('product'));
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

    public function destroy(Product $product)

    {

        $product->delete();



        return redirect()->route('products.index')

            ->with('success', 'Product deleted successfully');
    }
}
