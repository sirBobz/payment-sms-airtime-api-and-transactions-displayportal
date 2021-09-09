<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name'=> 'load airtime'],
            ['name'=> 'send sms'],
            ['name'=> 'make payments'],
            ['name'=> 'manage users'],
            ['name'=> 'register webhooks'],
            ['name'=> 'api credential settings'],
            ['name'=> 'balance alert settings'],
        ];
        DB::table('permissions')->insert($data);
    }
}
