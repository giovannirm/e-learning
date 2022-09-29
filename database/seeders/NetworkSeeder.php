<?php

namespace Database\Seeders;

use App\Models\Network;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NetworkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Network::create([
            'name' => 'Website',
            'logo' => '<i class="fa-solid fa-browser"></i>',
        ]);

        Network::create([
            'name' => 'Facebook',
            'logo' => '<i class="fa-brands fa-facebook"></i>',
        ]);

        Network::create([
            'name' => 'Linkedin',
            'logo' => '<i class="fa-brands fa-linkedin"></i>',
        ]);

        Network::create([
            'name' => 'Youtube',
            'logo' => '<i class="fa-brands fa-youtube"></i>',
        ]);       
    }
}
