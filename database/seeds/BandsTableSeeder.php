<?php

use Illuminate\Database\Seeder;
use App\Band;

class BandsTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('bands')->delete();
        DB::table('albums')->delete();
        //insert bands and assign to vars we can use to insert band ids with albums
        $yes = Band::create(
                    array('name' => 'Yes',
                        'start_date' => '1968-08-04',
                        'website' => "http://www.yesworld.com/",
                        'still_active' => true)
        );
        $zep = Band::create(
                    array('name' => 'Led Zeppelin',
                        'start_date' => '1968-01-01',
                        'website' => "http://www.ledzeppelin.com/",
                        'still_active' => false)
        );
        $phish = Band::create(
                    array('name' => 'Phish',
                        'start_date' => '1983-12-02',
                        'website' => "http://www.phish.com/",
                        'still_active' => true)
        );
        $pf = Band::create(
                    array('name' => 'Pink Floyd',
                        'start_date' => '1965-06-20',
                        'website' => "http://www.pinkfloyd.com/",
                        'still_active' => false)
        );
        DB::table('albums')->insert(
                array(
                    array(
                        'band_id' => $yes->id,
                        'name' => 'Fragile',
                        'recorded_date' => '1971-09-01',
                        'release_date' => '1971-11-26',
                        'number_of_tracks' => 9,
                        'label' => 'Atlantic Records',
                        'producer' => 'Yes, Eddie Offord',
                        'genre' => 'Progressive Rock'
                    ),
                    array(
                        'band_id' => $yes->id,
                        'name' => 'Close to the Edge',
                        'recorded_date' => '1972-07-01',
                        'release_date' => '1972-09-13',
                        'number_of_tracks' => 3,
                        'label' => 'Atlantic Records',
                        'producer' => 'Yes, Eddie Offord',
                        'genre' => 'Progressive Rock'
                    ),
                    array(
                        'band_id' => $zep->id,
                        'name' => 'Led Zeppelin',
                        'recorded_date' => '1968-10-01',
                        'release_date' => '1969-01-12',
                        'number_of_tracks' => 9,
                        'label' => 'Atlantic Records',
                        'producer' => 'Jimmy Page',
                        'genre' => 'Hard Rock'
                    ),
                    array(
                        'band_id' => $zep->id,
                        'name' => 'Houses of the Holy',
                        'recorded_date' => '1972-08-01',
                        'release_date' => '1973-03-28',
                        'number_of_tracks' => 8,
                        'label' => 'Atlantic Records',
                        'producer' => 'Jimmy Page',
                        'genre' => 'Hard Rock'
                    ),
                    array(
                        'band_id' => $phish->id,
                        'name' => 'Rift',
                        'recorded_date' => '1992-11-01',
                        'release_date' => '1993-02-02',
                        'number_of_tracks' => 15,
                        'label' => 'Elektra Records',
                        'producer' => 'Barry Beckett',
                        'genre' => 'Progressive Rock'
                    ),
                    array(
                        'band_id' => $phish->id,
                        'name' => 'Junta',
                        'recorded_date' => '1988-12-01',
                        'release_date' => '1989-05-08',
                        'number_of_tracks' => 11,
                        'label' => 'Elektra Records',
                        'producer' => 'Phish',
                        'genre' => 'Progressive Rock'
                    ),
                    array(
                        'band_id' => $pf->id,
                        'name' => 'The Dark Side of the Moon',
                        'recorded_date' => '1973-01-01',
                        'release_date' => '1973-03-01',
                        'number_of_tracks' => 10,
                        'label' => 'Harvest Records',
                        'producer' => 'Pink Floyd',
                        'genre' => 'Progressive Rock'
                    ),
                    array(
                        'band_id' => $pf->id,
                        'name' => 'Wish You Were Here',
                        'recorded_date' => '1975-07-01',
                        'release_date' => '1975-09-12',
                        'number_of_tracks' => 5,
                        'label' => 'Harvest-Columbia',
                        'producer' => 'Pink Floyd',
                        'genre' => 'Progressive Rock'
                    ),
                    array(
                        'band_id' => $pf->id,
                        'name' => 'The Wall',
                        'recorded_date' => '1979-11-01',
                        'release_date' => '1979-11-30',
                        'number_of_tracks' => 26,
                        'label' => 'Harvest-Columbia',
                        'producer' => 'Pink Floyd',
                        'genre' => 'Progressive Rock'
                    )
                )
                );
    }

}
