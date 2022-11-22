<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sql= "INSERT INTO languages (spanish,english,code) VALUES
        ('Belarusian ','Bieloruso','be'),
        ('Bulgarian ','Búlgaro','bu'),
        ('Czech ','Checo','cz'),
        ('Danish ','Danesa','da'),
        ('Dutch ','Holandés','du'),
        ('English ','Inglés','en'),
        ('Estonian ','Estonio','es'),
        ('Finnish ','Finlandés','fi'),
        ('French ','Francés','fr'),
        ('Flamenco','Flamenco','fl'),
        ('German ','Alemán','ge'),
        ('Greek ','Griego','gr'),
        ('Hungarian ','Húngaro','hu'),
        ('Italian ','Italiano','it'),
        ('Latvian ','Letón','la'),
        ('Lithuanian ','Lituano','li'),
        ('Norwegian ','Noruego','no'),
        ('Polish ','Polaco','po'),
        ('Romanian ','Rumano','ro'),
        ('Russian ','Ruso','ru'),
        ('Slovakian ','Eslovaco','sl'),
        ('Spanish ','Español','sp'),
        ('Swedish ','Sueco','sw'),
        ('Ukrainian ','Ucraniano','uk')";

        DB::update ($sql);
    }
}
