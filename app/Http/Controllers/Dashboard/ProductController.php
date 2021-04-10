<?php

namespace App\Http\Controllers\Dashboard;

use App\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\http\Controllers\Controller;
use App\http\Requests\StoreProductPost;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  Application|Factory|View
     */
    public function index()
    {
      $products = Product::orderBy('id','desc')->where('deleted', '=', '0')->paginate(3);
      return view('dashboard.product.index',['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  Application|Factory|View
     */
    public function create()
    {

      return  view("dashboard.product.create",['product' => new Product()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreProductPost $request
     * @return RedirectResponse
     */
    public function store(StoreProductPost $request): RedirectResponse
    {
        $requestData= $request->validated();

    $query = Builder::


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
     * @param Product $product
     * @return Application|Factory|Response|View
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
     * @param Product $product
     * @return Application|Factory|Response|View
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
     * @param StoreProductPost $request
     * @param Product $product
     * @return Application|RedirectResponse|Response|Redirector
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
     * @param Product $product
     * @return RedirectResponse
     */
    public function destroy(Product $product): RedirectResponse
    {
      $product->deleted = "1" ;
      $product->save();
      return back()->with('status','Elemento Eliminado ! ');
    }
}
