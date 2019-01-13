<?php

use Illuminate\Database\Seeder;
use App\Productos;

class ProductosTableSeeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Productos::class,80)->create();
    }
}
