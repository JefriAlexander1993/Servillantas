<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\User;
use Barryvdh\DomPDF\Facade as PDF;
use DB;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {

        $name= $request->get('name_user');
        $email= $request->get('email');
        $users = User::orderBy('id','desc')->paginate();
        // $users = DB::table('role_user')
        //     ->join('roles', 'role_user.role_id', '=', 'roles.id')
        //     ->join('users', 'role_user.user_id', '=', 'users.id')
        //     ->select('users.*', 'roles.name')
        //     ->orderBy('id', 'desc')->paginate('8');
            // ->name($name)
            // ->email($email)
      
           
          

        // $users = User::orderBy('id', 'desc')->paginate('8');

        return view('Admin.Users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function register(Request $request)
    {

        $user            = new User;
        $user->name_user = $request->name_user;
        $user->email     = $request->email;
        $user->password  = bcrypt($request->password);

        $user->save();

        return redirect()->route('Users.index')
            ->with('info', 'El usuario  fue registrado exitosamente.');

    }

    public function store(Request $request)
    {
        $user = User::create($request->all())->save();

        return redirect()->route('Users.index')
            ->with('info', 'El usuario  fue ha guardado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        return view('Admin.Users.show', ['user' => User::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('Admin.Users.edit', ['user' => User::findOrFail($id)]);
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
        $user           = User::find($id);
        $user->name_user     = $request->name_user;
        $user->email    = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->route('Users.index')
            ->with('info', 'El usuario actualizado exitosamente su datos.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $appointment = Appointment::find($id)->delete();

        return back()->with('danger', 'El usuario fue eliminada exitosamente.');
    }

//----------------------------Metodo de exportación--------------------------------------//
    //Explicación:
    // Debes ingresar este comando en la consola
    //php artisan make:export UsersExport --model=User
    // UsersExport--->Nombre depende que vaya a exportar e igual manera el modelo.
    //Eso te genera un archivo que esta en la siguiente posición app/Exports/
    // El hace la consulta en eloquent si usted quiere que salga otra cosa, pues hace la consulta, en este caso trae todo
    //lo de un modelo, luego de ello hace el metodo que esta en la parte inferior llamado exportUsersExcel, pero recuerde traer la clase que creo con el comando de la siguiente manera ej:use App\Exports\UsersExport; y de igual manera use Maatwebsite\Excel\Facades\Excel;

    //IMPORTANTE.----> Establecer las rutas. Ir al archivo web.php y crearla.

    public function exportUsersExcel()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    //Explicación:
    // Se crea el metodo que esta en la parte inferior llamado exportUsersPdf, eso lo que hace en la primera linea
    // Es traer todo los usuarios. La segubda linea envia la variable $users la cual trae todos los usuarios a una vista
    // Que debes crear, es como un index, en este caso esta resources/view/Reports/users
    // En la tercera linea descarga el pdf con el nombre establecido en este caso users.pdf

    public function exportUsersPdf()
    {

        $users = User::all();

        $pdf = PDF::loadView('Reports.users', compact('users'));

        return $pdf->download('users.pdf');
    }

}
