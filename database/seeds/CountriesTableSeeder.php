<?php

use Illuminate\Database\Seeder;
use App\Modules\Settings\Models\Country;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
       /* $data_to_insert = [];
        array_push($data_to_insert, [
            'iso2' => 'AF',
            'name' => 'AFGHANISTAN',
            'nicename' => 'Afghanistan',
            'iso3' => 'AFG',
            'numcode' => '4',
            'phonecode' => '93'
        ]);
        array_push($data_to_insert, [
            'iso2' => 'AL',
            'name' => 'ALBANIA',
            'nicename' => 'Albania',
            'iso3' => 'ALB',
            'numcode' => '8',
            'phonecode' => '355'
        ]);
        $collection = collect($data_to_insert); //turn data into collection
        $chunks = $collection->chunk(500); // chunk into smaller pieces
        $chunks->toArray(); //convert chunk to array

        //loop through chunks:
        foreach ($chunks as $chunk) {
            Country::insert($chunk); //insert chunked data
        }*/
        $country            = new Country;
        $country->iso2      = 'AF';
        $country->name      = 'AFGHANISTAN';
        $country->nicename  = 'Afghanistan';
        $country->iso3      = 'AFG';
        $country->numcode   = '4';
        $country->phonecode = '93';
        $country->save();

        $country            = new Country;
        $country->iso2      = 'AL';
        $country->name      = 'ALBANIA';
        $country->nicename  = 'Albania';
        $country->iso3      = 'ALB';
        $country->numcode   = '8';
        $country->phonecode = '355';
        $country->save();


    } // end -:- run()
}// end -:-
