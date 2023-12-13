<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Santri;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::create([
            'name'=>'Super Admin',
            // 'is_admin'=>1,
            'email'=>'superadmin@ibssys.com',
            'email_verified_at' =>now(),
            'password'=>Hash::make('rais141177130572'),
            'remember_token'=>Str::random(10),
        ]);
    //    Santri::factory(20)->create();
       $this->call(StrataSeeder::class);
       $this->call(TingkatSeeder::class);
       $this->call(HariSeeder::class);
    }
}
