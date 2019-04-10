<?php

namespace App\Http\Controllers;

use App\Product;
use DB;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {

        return view('Products.index', ['products' => Product::orderBy('id', 'DESC')->paginate('8')]);
    }

    public function create()
    {
        return view('Products.create');
    }

    public function store(Request $request)
    {
        if (Product::codeUnique($request->code)) {
            $product = Product::create($request->all())->save();

            return redirect()->route('Products.index')
                ->with('info', 'El producto fue ha guardado exitosamente.');
        } else {
            return back()->with('danger', 'El codigo' . $request->code . 'ya esta asociado a un producto.');

        }

    }

    public function update(Request $request, $id)
    {

        $product = Product::find($id)->update($request->all());

        return redirect()->route('Products.index')
            ->with('info', 'El producto fue actualizado exitosamente.');

    }

    public function edit($id)
    {

        return view('Products.edit', ['product1' => Product::findOrFail($id)]);
    }

    public function show($id)
    {

        return view('Products.show', ['product' => Product::findOrFail($id)]);
    }

    public function destroy($id)
    {
        $product = Product::find($id)->delete();

        return back()->with('danger', 'El producto fue eliminado exitosamente.');

    }

    public function getProductByCode($code) //Funcion que obtiene un articulo por medio de su codigo

    {

        $product = DB::table('products')->where('code', $code)->get(['id', 'code', 'name',
            'price']);

        if (count($product) > 0) {
            return response()->json([

                "datos" => $product,
                "code"  => 200,

            ]);

        } else {

            return response()->json([

                "error" => 'No existen datos con ese codigo.',
                "code"  => 600,

            ]);

        }

    }



}
