<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        /*$rol_root = new Role;
        $rol_root->name = 'ROL_ROOT';
        $rol_root->display_name = 'Root';
        $rol_root->description = 'Usuario que se encarga de administrar locales,usuarios, permisos y roles';
        $rol_root->save();*/

        $rol_administrador = new Role;
        $rol_administrador->name = 'ROL_ADMINISTRADOR';
        $rol_administrador->display_name = 'Administrador';
        $rol_administrador->description = 'Usuario que se encarga de administrar usuarios, permisos y roles, mas.';

        $rol_administrador->save();
    
        $rol_vendedor = new Role;
        $rol_vendedor->name = 'ROL_VENDEDOR';
        $rol_vendedor->display_name = 'Vendedor';
        $rol_vendedor->description = 'Usuario que puede hacer ventas de producto o servicios.';
        $rol_vendedor->save();


        $rol_mecanico = new Role;
        $rol_mecanico->name = 'ROL_MECANICO';
        $rol_mecanico->display_name = 'Mecanico';
        $rol_mecanico->description = 'Usuario que puede registra hora de llegada y de salida de un vehiculo';
        $rol_mecanico->save();

        $rol_cliente = new Role;
        $rol_cliente->name = 'ROL_CLIENTE';
        $rol_cliente->display_name = 'Mecanico';
        $rol_cliente->description = 'Usuario que puede separar cita, comprar servicios o productos';
        $rol_cliente->save();


    }
}
