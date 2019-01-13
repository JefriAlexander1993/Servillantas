<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Http\Requests\ProductRequest;
use Validator;

class ProductController extends Controller
{
    
     public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    
        return view('Products.index', ['products'=>Product::orderBy('id','DESC')->paginate()]); 
    }

    public function create()
    {
        return view('Products.create');
    }

    public function store(ProductRequest $request)
    {
        
        $product =  Product::create($request->all())->save();

        return redirect()->route('Products.index')
                ->with('info','El producto fue ha guardado exitosamente.');
    }

     public function update(ProductRequest $request, $id)
    {
        
        $product = Product::find($id)->update($request->all());   

            return redirect()->route('Products.index')
                ->with('info','El producto fue actualizado exitosamente.');

    }


    public function edit($id)
    {
   
        return view('Products.edit', ['product' => Product::findOrFail($id)]);
    }

    public function show($id)
    {

        return view('Products.show', ['product' => Product::findOrFail($id)]);
    }

    public function destroy($id)
    {
        $product =  Product::find($id)->delete();

        return back()->with('info','El producto fue eliminado exitosamente.');
        
    }
}
