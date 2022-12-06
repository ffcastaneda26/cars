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
            ('make','make',1,4),
            ('model','model',1,6),
            ('model year','model_year',0,null),
            ('product type','product_type',1,3),
            ('body','body',1,13),
            ('series','series',1,6),
            ('drive','drive',1,17),
            ('engine displacement (ccm)','engine_displacement',0,null),
            ('engine power (kw)','engine_power_kw',0,null),
            ('engine power (hp)','engine_power_hp',0,null),
            ('fuel type - primary','fuel_type_primary',1,8),
            ('transmission','transmission',1,9),
            ('number of gears','number_of_gears',0,null),
            ('manufacturer','manufacturer',1,18),
            ('manufacturer address','manufacturer_address',1,17),
            ('plant city','plant_city',1,10),
            ('plant company','plant_company',1,10),
            ('plant country','plant_country',1,6),
            ('production stopped','production_stopped',0,null),
            ('engine compression ratio','engine_compression_ratio',0,null),
            ('engine cylinder bore (mm)','engine_cylinder_bore_mm',0,null),
            ('engine cylinders','engine_cylinders',0,null),
            ('engine cylinders position','engine_cylinders_position',1,6),
            ('engine position','engine_position',1,16),
            ('engine rpm','engine_rpm',0,null),
            ('engine stroke (mm)','engine_stroke_m',0,null),
            ('engine torque (rpm)','engine_torque_rpm',0,null),
            ('engine turbine','engine_turbine',1,18),
            ('valve train','valve_train',1,11),
            ('fuel capacity (l)','fuel_capacity',0,null),
            ('fuel consumption combined (l\/100km)','fuel_consumption_combined',0,null),
            ('fuel consumption extra urban (l\/100km)','fuel_consumption_extra_urba',0,null),
            ('fuel consumption urban (l\/100km)','fuel_consumption_urban',0,null),
            ('fuel system','fuel_system',1,18),
            ('valves per cylinder','valves_per_cylinder',0,null),
            ('number of doors','number_of_doors',0,null),
            ('number of seat rows','number_of_seat_rows',0,null),
            ('number of seats','number_of_seats',0,null),
            ('front brakes','front_brakes',1,16),
            ('rear brakes','rear_brakes',1,4),
            ('steering','steeering',1,18),
            ('steering type','steering_tyype',1,18),
            ('rear suspension','rear_suspension',1,18),
            ('front suspension','front_suspension',1,17),
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
            ('fuel type - secondary','fuel_type_secondary',1,8),
            ('engine model','engine_model',1,18),
            ('transmission (full)','transmission_full',1,16),
            ('plant state','plant_state',1,8),
            ('market','market',1,2),
            ('made','made_date',1,10),
            ('production started','production_started',0,null)";



        DB::update ($sql);

    }
}
