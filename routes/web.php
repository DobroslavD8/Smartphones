<?php
use Illuminate\Support\Facades\Input;
use App\Phones;
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

Route::resource('phones', 'PhonesController');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/manufacturers', function(){
    $phones = DB::table('phones')->get();
    return view('ManufacturerList', ['phones'=>$phones]);
});

Route::get('/models', function(){
    $phones = DB::table('phones')->get();
    return view('ModelList', ['phones'=>$phones]);
});

Route::get('/adminpanel', function(){
    return view('adminPanel', ['phones'=>'']);
});

Route::any('/search',function(){
    $q = Input::get ( 'q' );
    $phone = Phones::where('productionYear','LIKE','%'.$q.'%')->orWhere('model','LIKE','%'.$q.'%')->orWhere('manufacturer','LIKE','%'.$q.'%')->get();
    if(count($phone) > 0)
        return view('phones.index')->withDetails($phone)->withQuery ( $q );
    else return view ('phones.index')->withMessage('No Details found. Try to search again !');
});
