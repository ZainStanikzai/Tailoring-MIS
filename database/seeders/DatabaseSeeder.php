<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::create([
            'name' => 'خان استاد',
            'email' => 'khan123',
            'phone' => '+93 78 890 0226',
            'address'=>'کارت نو د پشتون مارکیت مخاخ,کابل افغانستان.',
            'password' => '123456789',
        ]);
        \App\Models\Setting::create([
            'icon' => 'null',
            'layoutMode' => 'light',
            'tapbarColor' => 'light',
            'sidbarSize'=>'small',
            'sidebarColor' => 'light',
        ]);
        \App\Models\Staff::create([
            'name' => 'stanikzai',
            'phone'=>'0765957291',
            'salary' => 0,
        ]);
        
        
    }
}
