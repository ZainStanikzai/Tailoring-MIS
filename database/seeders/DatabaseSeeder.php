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
        \App\Models\Neck::create(
            ['name' => 'neck style 1','clothing_type'=>'cloth']
        );
        \App\Models\Neck::create(
            ['name' => 'neck style 1','clothing_type'=>'vakset']
        );
        \App\Models\Shoulder::create(
            ['name' => 'shoulder style 1','clothing_type'=>'cloth']
        );
        \App\Models\Shoulder::create(
            ['name' => 'shoulder style 1','clothing_type'=>'vasket']
        );
        \App\Models\Sleeve::create(
            ['name' => 'sleeve style 1','clothing_type'=>'cloth']
        );
        
        \App\Models\Sleeve::create(
            ['name' => 'sleeve style 1','clothing_type'=>'vasket']
        );
        \App\Models\Skirt::create(
            ['name' => 'skirt style 1','clothing_type'=>'cloth']
        );
        
        \App\Models\Skirt::create(
            ['name' => 'skirt style 1','clothing_type'=>'vasket']
        );
        \App\Models\style_buttonStyle::create(
            ['name' => 'button style 1']
        );
        \App\Models\style_coatBackStyle::create(
            ['name' => 'coatBack style 1']
        );
        \App\Models\style_frontpocketStyle::create(
            ['name' => 'frontPocket style 1']
        );
        \App\Models\style_sidepocketStyle::create(
            ['name' => 'sidePocket style 1']
          
        );
        \App\Models\style_sleeveMouthStyle::create(
            ['name' => 'sleeveMouth style 1']
        );
        \App\Models\style_neckSubStyle::create(
            ['name' => 'neckSub style 1']
        );
        \App\Models\style_salayeeStyle::create(
            ['name' => 'salayee style 1']
        );

        
        
    }
}
