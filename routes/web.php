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

Route::post('track/meets/{meet}/results', 'Meets\Track\Results\Team\ResultsController@store');
Route::resources([
	'athletes' 				=>	'AthletesController',
	'meets/genders'			=>	'Meets\GendersController',
	'meets/hosts'			=>	'Meets\HostsController',
	'meets/divisions'		=>	'Meets\DivisionsController',
    'meets/timing'			=>	'Meets\TimingsController',
    'track/seasons'		    =>	'Meets\Track\SeasonsController',
	// 'track/events'			=>	'TrackEventsController',
	'track/meet/names'		=>	'Meets\Track\NamesController',
    'track/venues'			=>	'Meets\Track\VenuesController',
	'track/meets'			=>  'Meets\Track\MeetsController',
	'track/team/results'	=>	'Meets\Track\Results\Team\ResultsController',
	// 'track/individual_results'	=>	'TrackIndividualResultsController'
]);
