<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ApiTagsAttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sql= "INSERT INTO api_tags_attributes (api_tag,table_attribute,truncate,length_truncate) VALUES
            ('vin','vin',1,17),
            ('vehicle id','vehicle_id',0,null),
            ('make','make',0,null),
            ('model','model',0,null),
            ('model year','model_year',0,null),
            ('product type','product_type',0,null),
            ('body','body',0,null),
            ('series','series',0,null),
            ('drive','drive',0,null),
            ('engine displacement (ccm)','engine_displacement',0,null),
            ('engine power (kw)','engine_power_kw',0,null),
            ('engine power (hp)','engine_power_hp',0,null),
            ('fuel type - primary','fuel_type_primary',0,null),
            ('transmission','transmission',0,null),
            ('number of gears','number_of_gears',0,null),
            ('engine cylinders','engine_cylinders',0,null),
            ('engine cylinders position','engine_cylinders_position',0,null),
            ('engine position','engine_position',0,null),
            ('engine rpm','engine_rpm',0,null),
            ('engine stroke (mm)','engine_stroke_m',0,null),
            ('fuel capacity (l)','fuel_capacity',0,null),
            ('fuel consumption combined (l\/100km)','fuel_consumption_combined',0,null),
            ('fuel system','fuel_system',1,18),
            ('number of doors','number_of_doors',0,null),
            ('number of seat rows','number_of_seat_rows',0,null),
            ('number of seats','number_of_seats',0,null),
            ('front brakes','front_brakes',0,null),
            ('rear brakes','rear_brakes',0,null),
            ('steering','steeering',0,null),
            ('steering type','steering_tyype',0,null),
            ('rear suspension','rear_suspension',0,null),
            ('front suspension','front_suspension',0,null),
            ('drag coefficient','drag_coefficient',0,null),
            ('wheel rims size','wheel_rims_size',1,3),
            ('wheel rims size array','wheel_rims size_array',0,null),
            ('wheel size','wheel_size',1,11),
            ('wheel size array','wheel_size_array',0,null),
            ('wheelbase (mm)','wheelbase',0,null),
            ('wheelbase array (mm)','wheel_base_array',0,null),
            ('height (mm)','height',0,null),
            ('length (mm)','lenght',0,null),
            ('width (mm)','width',0,null),
            ('width including mirrors (mm)','width_including mirrors',0,null),
            ('track front (mm)','track_front',0,null),
            ('track rear (mm)','track_rear',0,null),
            ('acceleration 0-100 km\/h (s)','acceleration',0,null),
            ('max speed (km\/h)','max_speed',0,null),
            ('minimum turning circle (m)','minimum_turning_circle',0,null),
            ('minimum trunk capacity (l)','minimum_trunk_capacity',0,null),
            ('weight empty (kg)','weight_empty_kg',0,null),
            ('abs','abs',0,null),
            ('check digit','check_digit',0,null),
            ('sequential number','sequential_number',0,null),
            ('trim','trim',1,4),
            ('fuel type - secondary','fuel_type_secondary',0,null),
            ('engine model','engine_model',1,18),
            ('transmission (full)','transmission_full',0,null)";

            DB::update ($sql);

    }
}
