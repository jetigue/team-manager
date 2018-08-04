<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('track/meet_properties/{meet}', 'Meets\Track\Results\Team\ResultsController@store');
Route::patch('track/meet_properties/{meet}/results/{result}', 'Meets\Track\Results\Team\ResultsController@update');

Route::apiResources([
    // General Properties
    'api/general-properties/distances' => 'API\GeneralProperties\DistancesController',
    'api/general-properties/seasons'   => 'API\GeneralProperties\SeasonsController',
    'api/general-properties/terrains'  => 'API\GeneralProperties\TerrainsController',

    // Meet Properties
    'api/meet-properties/hosts'        => 'API\MeetProperties\HostsController',
    'api/meet-properties/timing'       => 'API\MeetProperties\TimingMethodsController',

    // Race Properties
    'api/race-properties/divisions'    => 'API\RaceProperties\DivisionsController',
    'api/race-properties/genders'      => 'API\RaceProperties\GendersController',

    // Training Properties
    'api/training-properties/efforts'  => 'API\TrainingProperties\EffortsController',
    'api/training-properties/feelings' => 'API\TrainingProperties\FeelingsController',
    'api/training-properties/times'    => 'API\TrainingProperties\DayTimesController',
    'api/training-properties/types'    => 'API\TrainingProperties\RunTypesController',

    // Cross Country
    'api/cross-country/meet/names'     => 'API\CrossCountry\MeetNamesController',
    'api/cross-country/venues'         => 'API\CrossCountry\VenuesController',
    'api/cross-country/meets'          => 'API\CrossCountry\MeetsController',
    'api/cross-country/events'         => 'API\CrossCountry\EventsController',

    // Track
    'api/track/meet/names'     => 'API\Track\MeetNamesController',
    'api/track/venues'         => 'API\Track\VenuesController',
    'api/track/meets'          => 'API\Track\MeetsController',
    'api/track/events'         => 'API\Track\EventsController',
    'api/track/seasons'         => 'API\Track\SeasonsController',

]);

Route::resources([
    'athletes'                         => 'AthletesController',
    // General Properties
    'general-properties/distances'     => 'GeneralProperties\DistancesController',
    'general-properties/seasons'       => 'GeneralProperties\SeasonsController',
    'general-properties/terrain-types' => 'GeneralProperties\TerrainsController',

    // Meet Properties
    'meet-properties/hosts'            => 'MeetProperties\HostsController',
    'meet-properties/timing'           => 'MeetProperties\TimingsController',

    // Race Properties
    'race-properties/divisions'        => 'RaceProperties\DivisionsController',
    'race-properties/genders'          => 'RaceProperties\GendersController',

    // Training Properties
    'training-properties/day-times'    => 'TrainingProperties\DayTimesController',
    'training-properties/run-efforts'  => 'TrainingProperties\EffortsController',
    'training-properties/run-feelings' => 'TrainingProperties\FeelingsController',
    'training-properties/run-types'    => 'TrainingProperties\RunTypesController',

    // Cross Country
    'cross-country/meet-names'         => 'CrossCountry\NamesController',
    'cross-country/venues'             => 'CrossCountry\VenuesController',
    'cross-country/meets'              => 'CrossCountry\MeetsController',

    // Track
    'track/meet-names'                 => 'Track\NamesController',
    'track/meets'                      => 'Track\MeetsController',
    'track/seasons'                    => 'Track\SeasonsController',
    'track/venues'                     => 'Track\VenuesController',
    // 'track/events'			=>	'EventsController',

    'track/team/results' => 'Track\Results\Team\ResultsController',
    // 'track/individual_results'	=>	'TrackIndividualResultsController'
]);
