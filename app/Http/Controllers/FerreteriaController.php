<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Support\Facades\Validator;

class FerreteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $products = Product::with('images')->get();
        return view('ferreteria.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        return view('ferreteria.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'sale_price' => 'required|min:1',
            'purchase_price' => 'required|min:1',
            'images_products' => 'required'
        ],
        [
            'name.required' => 'El nombre del producto es requerido',
            'sale_price.required' => 'El precio de venta del producto es requerido',
            'purchase_price.required' => 'El precio de compra del producto es requerido',
            'images_products.required' => 'Debe adjuntar por lo menos una imagen'
        ]
    );

        if($validator->fails()){
            return redirect('ferreteria/create')
                ->withErrors($validator)
                ->withInput();
        }

        try{
            \DB::beginTransaction();

            $product = new Product;
            $product->name = $request->name;
            $product->description = $request->description;
            $product->sale_price = $request->sale_price;
            $product->purchase_price = $request->purchase_price;
            $product->state = 1;
            $product->save();

            $files = $request->file('images_products');
            foreach($files as $file){
                $nombre = time().$file->getClientOriginalName();
                \Storage::disk('products')->put($nombre,  \File::get($file));

                $image = new ProductImage();
                $image->image = $nombre;
                $image->product_id = $product->id;
                $image->save();
            }
            \DB::commit();
            return redirect()->back()->with('success', 'Producto creado satisfactoriamente');   
        }catch(\Exception $e){
            \DB::rollback();
            return $e;
        } 
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::with('images')->where('id', $id)->first();
        return view('ferreteria.edit', compact('product'));
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
        try{
            $product = Product::findOrFail($id);
            $product->name = $request->name;
            $product->description = $request->description;
            $product->sale_price = $request->sale_price;
            $product->purchase_price = $request->purchase_price;
            $product->state = 1;
            $product->save();

            return redirect()->back()->with('success', 'Producto actualizado satisfactoriamente');   
        }catch(\Exception $e){
            \DB::rollback();
            return $e;
        } 
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
