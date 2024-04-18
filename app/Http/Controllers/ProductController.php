<?php
//dentro del controlador generar un método que se llame details(){} que devuelva la palabra "details"
//Crear ruta de tipo get que se llame deatils Route::Get(details)
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  
  
   //TEST 18-4-2024
  public function details()
  {
    return "Estoy retornando Details"; //Probando POstman
  }

  public function insertProduct(StoreProductRequest $request){
    Product::create($request->all());
    return redirect()->route('products.index');
  }

  public function getProduct($id){
        $product = Product::find($id);
    return $product;
  }
///////////////////////////////////////////////////////



  public function index() : View
  {
    return view('products.index', [
        'products' => Product::latest()->paginate(3)
    ]);
  }

  /*public function index() : View
  {
    $products = Product::all();
    return $products;
    /*return view('products.index', [
        'products' => Product::latest()->paginate(3)
    ]);
  }/*

  /**
   * Show the form for creating a new resource.
   */
  public function create(): View
  {
    return view('products.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(StoreProductRequest $request): RedirectResponse
  {
    Product::create($request->all());
    return redirect()->route('products.index')
      ->withSuccess('New product is added successfully.');
  }

  /**
   * Display the specified resource.
   */
  public function show(Product $product): View
  {
    return view('products.show', [
      'product' => $product
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Product $product): View
  {
    return view('products.edit', [
      'product' => $product
    ]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateProductRequest $request, Product $product): RedirectResponse
  {
    $product->update($request->all());
    return redirect()->back()
      ->withSuccess('Product is updated successfully.');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Product $product): RedirectResponse
  {
    $product->delete();
    return redirect()->route('products.index')
      ->withSuccess('Product is deleted successfully.');
  }
}