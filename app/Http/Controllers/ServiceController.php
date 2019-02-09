<?php

namespace App\Http\Controllers;

use App\Service;
use DB;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        return view('Services.index', ['services1' => Service::orderBy('id', 'DESC')->paginate('8')]);

    }

    public function create()
    {
        return view('Services.create');
    }

    public function store(Request $request)
    {
        if (Service::codeUnique($request->code)) {

            $service = Service::create($request->all())->save();
            return redirect()->route('Services.index')
                ->with('info', 'El servicio fue guardado exitosamente.');
        } else {
            return back()->with('danger', 'El codigo' . $request->code . 'ya esta asociado a un servicio.');

        }

    }

    public function update(Request $request, $id)
    {

        $service = Service::find($id)->update($request->all());

        return redirect()->route('Services.index')
            ->with('info', 'El servicio fue actualizado');

    }

    public function edit($id)
    {

        return view('Services.edit', ['service' => Service::findOrFail($id)]);
    }

    public function show($id)
    {

        return view('Services.show', ['service' => Service::findOrFail($id)]);
    }

    public function destroy($id)
    {
        $service = Service::find($id)->delete();

        return back()->with('info', 'El servicio fue eliminado');

    }

    public function getServiceByCode($code) //Funcion que obtiene un articulo por medio de su codigo

    {

        $service = DB::table('services')->where('code', $code)->get(['id', 'code', 'name',
            'price']);

        if (count($service) > 0) {
            return response()->json([

                "datos" => $service,
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
