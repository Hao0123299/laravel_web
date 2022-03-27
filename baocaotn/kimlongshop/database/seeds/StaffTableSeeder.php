<?php

use Illuminate\Database\Seeder;
use App\Roles;
use App\Admin;
class StaffTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*có csdl mới */
        Admin::truncate();

        $adminRoles = Roles::where('name', 'admin')->first();
        $staffRoles = Roles::where('name', 'nhân viên')->first();

        $admin = Admin::create(
            [
                'admin_name' => 'admin',
                'admin_email' => 'admin@gmail.com',
                'admin_phone' => '0963282942',
                'admin_password' => md5('admin')
            ]
        );
        $staff = Admin::create(
            [
                'admin_name' => 'nhanvien',
                'admin_email' => 'test@gmail.com',
                'admin_phone' => '0932156895',
                'admin_password' => md5('test')
            ]
        );
        $admin->roles()->attach($adminRoles);
        $staff->roles()->attach($staffRoles);
    }
}
