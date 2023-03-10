<?php



use Illuminate\Database\Seeder;

use App\User;

use Spatie\Permission\Models\Role;

use Spatie\Permission\Models\Permission;



class CreateAdminUserSeeder extends Seeder

{

    /**

     * Run the database seeds.

     *

     * @return void

     */

    public function run()

    {

        $user = User::create([

            'name' => 'Jewel Rana',

            'email' => 'meneva92@gmail.com',

            'password' => bcrypt('admin123456')

        ]);



        $role = Role::create(['name' => 'Admin']);



        $permissions = Permission::pluck('id', 'id')->all();



        $role->syncPermissions($permissions);



        $user->assignRole([$role->id]);
    }
}
