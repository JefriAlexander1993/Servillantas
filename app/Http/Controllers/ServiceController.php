<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\Http\Requests\ServicioRequest;

class ServiceController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
       
        return view('Services.index', ['services1'=>Service::orderBy('id','DESC')->paginate('8')]); 

    }

    public function create()
    {
        return view('Services.create');
    }

    public function store(Request $request)
    {
         $service = Service::create($request->all())->save();

        return redirect()->route('Services.index')
        ->with('info','El servicio fue guardado');
    }

     public function update(Request $request, $id)
    {
        $service = Service::find($id)->update($request->all());

        return redirect()->route('Services.index')
        ->with('info','El servicio fue actualizado');

    }


    public function edit($id)
    {
    	
        return view('Services.edit',['service' => Service::findOrFail($id)]);
    }

    public function show($id)
    {
       
        return view('Services.show', [ 'service' => Service::findOrFail($id)]);
    }

    public function destroy($id)
    {
        $service =  Service::find($id)->delete();;
  
      return back()->with('info','El servicio fue eliminado');
        
    }
}
