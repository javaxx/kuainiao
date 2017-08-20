<?php

use App\User;
use Illuminate\Database\Seeder;

class PersissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        //情况
        \App\Permission::truncate();
        \App\Role::truncate();
        User::truncate();
        DB::table('role_user')->delete();
        DB::table('permission_role')->delete();

        //创建初始的用户
/*        $kuainiao = User::create([
            'name'=>'快鸟',
            ''
        ]);*/
    }
}
