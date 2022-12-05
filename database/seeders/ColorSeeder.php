<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::statement('SET FOREIGN_KEY_CHECKS = 0;'); // Desactivamos la revisión de claves foráneas
        DB::table('colors')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;'); // Desactivamos la revisión de claves foráneas

      $sql= "INSERT INTO colors (english,spanish) VALUES
                ('Alabaster Silver Metallic','Plata alabastro metalizado'),
                ('Ash Black','ceniza negro'),
                ('Aspen White','álamo temblón blanco'),
                ('Billet Silver Metallic','Plateado Billet Metálico'),
                ('Black','Negro'),
                ('Blue','Azul'),
                ('Bright White','Blanco brillante'),
                ('Bright White Clearco','Clearco blanco brillante'),
                ('Bright White Clearcoat','Capa transparente blanca brillante'),
                ('Brilliant Silver','Plata brillante'),
                ('Bronze','Bronce'),
                ('Bronze Fire/Caribou','Bronce Fuego/Caribú'),
                ('Brown','Marrón'),
                ('Burgundy','borgoña'),
                ('Caspian Blue','Azul Caspio'),
                ('Celestial Silver Met','Plata Celestial Met'),
                ('Deep Cherry Red Crys','Crys rojo cereza profundo'),
                ('Ebony Black','Ebano negro'),
                ('Flame Red','Llama roja'),
                ('Glacier White','Blanco Glaciar'),
                ('Gold','Oro'),
                ('Gray','Gris'),
                ('Green','Verde'),
                ('Green Gem Metallic','Gema verde metalizado'),
                ('Gun Metallic','Pistola Metálica'),
                ('Ingot Silver','Lingote de plata'),
                ('Ingot Silver Metalli','Lingote de plata metali'),
                ('Ingot Silver Metallic','Plata Lingote Metálica'),
                ('Mango Tango Pearl','Mango Tango Perla'),
                ('Maroon','Granate'),
                ('Meteor Gray Mica','Mica gris meteoro'),
                ('Mineral Gray Metallic','Gris mineral metalizado'),
                ('Oxford White','Oxford Blanco'),
                ('Phantom Black','negro fantasma'),
                ('Pitch Black','tono negro'),
                ('Purple','Violeta'),
                ('Radiant Silver Metal','Metal plateado radiante'),
                ('Red','Rojo'),
                ('Silver','Plata'),
                ('Silver Ice Metallic','Hielo plateado metalizado'),
                ('Sliver','Astilla'),
                ('Stone White','Blanco Piedra'),
                ('Summit White','Blanco cumbre'),
                ('Super Black','súper negro'),
                ('Taffeta White','Tafetán Blanco'),
                ('Tan','Bronceado'),
                ('Tuxedo Black','Esmoquin Negro'),
                ('Tuxedo Black Metalli','Esmoquin Negro Metalli'),
                ('Vermillion Red','rojo bermellón'),
                ('White','Blanco'),
                ('White Diamond','Diamante blanco'),
                ('Yellow','Amarillo')";


        DB::update ($sql);

    }
}
