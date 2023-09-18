<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // migration ile olusturdugum users isimli tabloya seeder ile manuel deger atamsi yaptim.
        DB::table('users')->insert([
            'name' => 'Users1',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
            // vt de parola gozukmesin projede acik oldugu icin comment
            'updated_at' => \Carbon\Carbon::now(),
            'created_at' => \Carbon\Carbon::now(),
        ]);
    }
}