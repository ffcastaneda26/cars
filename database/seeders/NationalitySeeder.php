<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class NationalitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sql= "INSERT INTO nationalities (english,short_english,spanish,short_spanish) VALUES
        ('American ','American','Estadounidense','Estadoun'),
        ('Canadian ','Canadian','Canadiense','Canadien'),
        ('Finnish ','Finnish ','Finlandesa','Finlande'),
        ('Austrian ','Austrian','Austriaca','Austriac'),
        ('Belarusian ','Belarusi','Bielorusa','Bielorus'),
        ('British ','British ','Británica','Británic'),
        ('Dutch ','Dutch ','Holandesa','Holandes'),
        ('Irish ','Irish ','Irlandesa','Irlandes'),
        ('Ukrainian ','Ukrainia','Ucraniana','Ucranian'),
        ('French ','French ','Francesa','Francesa'),
        ('Italian ','Italian ','Italiana','Italiana'),
        ('Mexican ','Mexican ','Mexicana','Mexicana'),
        ('Scottish ','Scottish','Escocesa','Escocesa'),
        ('Slovak/Slovakian ','Slovak/S','Eslovaca','Eslovaca'),
        ('Spanish ','Spanish ','Española','Española'),
        ('Bulgarian ','Bulgaria','Búlgara','Búlgara'),
        ('German ','German ','Alemana','Alemana'),
        ('Hungarian ','Hungaria','Húngara','Húngara'),
        ('Lithuanian ','Lithuani','Lituana','Lituana'),
        ('Norwegian ','Norwegia','Noruega','Noruega'),
        ('Danish ','Danish ','Danesa','Danesa'),
        ('Estonian ','Estonian','Estona','Estona'),
        ('Greek ','Greek ','Griega','Griega'),
        ('Latvian ','Latvian ','Letona','Letona'),
        ('Polish ','Polish ','Polaca','Polaca'),
        ('Romanian ','Romanian','Rumana','Rumana'),
        ('Belgian ','Belgian ','Belga','Belga'),
        ('Czech ','Czech ','Checa','Checa'),
        ('Swedish ','Swedish ','Sueca','Sueca'),
        ('Swiss ','Swiss ','Suiza','Suiza'),
        ('Russian ','Russian ','Rusa','Rusa'),
        ('Argentin','Argentin','Argentino','Argentin')";

        DB::update ($sql);
    }
}
