<?php

use Illuminate\Database\Seeder;
use App\Roles;
class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*xóa dữ liệu table roles*/
        Roles::truncate();

        Roles::create(['name'=>'admin']);
        Roles::create(['name'=>'nhân viên']);
    }
}
