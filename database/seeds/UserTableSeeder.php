<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $rol_administrador  = Role::where('name', 'ROL_ADMINISTRADOR')->first();
      /*  $rol_vendedor = Role::where('name_rol', 'ROL_VENDEDOR')->first(); 
      /*  $rol_cliente = Role::where('name', 'ROL_CLIENTE')->first();  */
        $rol_mecanico = Role::where('name', 'ROL_MECANICO')->first();  
    



       /* $root = new User;
        $root->name = 'Root';
        $root->apellido = 'Master';
        $root->email = 'root@example.com';
        $root->password = bcrypt('root');
        $root->telefono = '';
        $root->save();
        $root->roles()->attach($rol_root);*/


        $administrador = new User;
        $administrador->name_user = 'Administrador';
        $administrador->lastname = 'Principal';
        $administrador->email = 'administrador@example.com';
        $administrador->password = bcrypt('administrador');
        $administrador->phone = '';
        $administrador->save();
        $administrador->roles()->attach($rol_administrador);


     /*   $vendedor = new User;
        $vendedor->name = 'Vendedor';
        $vendedor->lastname = 'Numero Uno';
        $vendedor->email = 'vendedor@example.com';
        $vendedor->password = bcrypt('vendedor');
        $vendedor->phone = '';
        $vendedor->save();
        $vendedor->roles()->attach($rol_vendedor);*/
      
     /*   $cliente = new User;
        $cliente->name = 'Cliente';
        $cliente->lastname = 'Numero Uno';
        $cliente->email = 'cliente@example.com';
        $cliente->password = bcrypt('cliente');
        $cliente->phone = '';
        $cliente->save();
        $cliente->roles()->attach($rol_cliente);
*/

        $mecanico = new User;
        $mecanico->name_user = 'Mecanico';
        $mecanico->lastname = 'Numero Uno';
        $mecanico->email = 'mecanico@example.com';
        $mecanico->password = bcrypt('mecanico');
        $mecanico->phone = '';
        $mecanico->save();
        $mecanico->roles()->attach($rol_mecanico);
    }
}
