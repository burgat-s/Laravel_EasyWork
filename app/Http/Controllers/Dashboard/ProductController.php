<?php

namespace App\Http\Controllers\Dashboard;

use App\Product;
use Illuminate\Http\Request;
use App\http\Controllers\Controller;
use App\http\Requests\StoreProductPost;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $products = Product::orderBy('id','desc')->where('deleted', '=', '0')->paginate(3);
      return view('dashboard.product.index',['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return  view("dashboard.product.create",['product' => new Product()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductPost $request)
    {
        $requestData= $request->validated();

        if ( null != $request->file("image")) {
            $ruta = $request->file("image")->store("public/product");
            $nombreArchivo = basename($ruta);
            $requestData['image'] = $nombreArchivo;
        }else{
            $requestData['image'] = null;
        }

      Product::create($requestData);

      return back()->with('status','Producto cargado ! ');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\dashboard\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
      if (is_object($product)) {
        return  view("dashboard.product.show",['product'=> $product]);
      }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\dashboard\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
      if (is_object($product)) {
        return  view("dashboard.product.edit",['product'=> $product]);
      }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\dashboard\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProductPost $request, Product $product)
    {
        $requestData= $request->validated();

      if ( null != $request->file("image")) {
        $ruta = $request->file("image")->store("public/product");
        $nombreArchivo = basename($ruta);
        $requestData['image'] = $nombreArchivo;
      }else{
          $requestData['image'] = null;
      }
      if (!$request->featured) {
        $requestData['featured'] =  0 ;
      }
        $product->update($requestData);

       return redirect(route('product.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\dashboard\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
      $product->deleted = "1" ;
      $product->save();
      return back()->with('status','Elemento Eliminado ! ');
    }
}
