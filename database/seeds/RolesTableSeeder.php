<?php

use Illuminate\Database\Seeder;
use App\Repositories\Role\Role;

class RolesTableSeeder extends Seeder {

    public function run()
    {
        DB::table('roles')->delete();
        $adminRole = new Role;
        $adminRole->name = 'admin';
        $adminRole->description = 'description';
        $adminRole->save();

        $schoolAdminRole = new Role;
        $schoolAdminRole->name = 'school_admin';
        $schoolAdminRole->description = 'description';
        $schoolAdminRole->save();

        $schoolAdminRole = new Role;
        $schoolAdminRole->name = 'regular';
        $schoolAdminRole->description = 'description';
        $schoolAdminRole->save();

    }

}