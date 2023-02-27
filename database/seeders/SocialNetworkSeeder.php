<?php

namespace Database\Seeders;

use App\Models\SocialNetwork;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SocialNetworkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $social_medias = ['Facebook','Instagram','tweeter','Whatsapp','Youtube','Linkedin'];

        foreach($social_medias as $social_media){
            SocialNetwork::create([
                'name' => $social_media,
                'active' => 1
            ]);
        }



    }

}
