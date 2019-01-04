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

Route::get('/search', function(){
   $q = Input::get('query');
   if ($q != "") {
       $phones = Phones::where('productionYear', 'LIKE', '%' . $q . '%')
           ->orWhere('model', 'LIKE', '%' . $q . '%')
           ->orWhere('manufacturer', 'LIKE', '%' . $q . '%')->get()->all();
       if (count($phones) > 0) {
           return view('phones.index')->with(['phones' => $phones, 'query' => $q]);
       } else {
           return view('phone.index')->with(['message', "No phones found for this search!"]);
       }
   }
   else{
       return view('phones.index')->with(['message', "Your search is empty!"]);
   }
});
