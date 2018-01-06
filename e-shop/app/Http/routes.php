<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/article/ajouter/{id}', [
    'uses' => 'ArticleController@addItem',
    'as' => 'article.ajouter'
]);

Route::get('/article/ajouter1/{id}', [
    'uses' => 'ArticleController@addItem1',
    'as' => 'article.ajouter1'
]);

Route::get('/', [
    'uses' => 'ArticleController@index',
    'as' => 'article.index'
]);

Route::get('/vetement', [
    'uses' => 'ArticleController@vetement',
    'as' => 'article.vetement'
]);

Route::get('/livre', [
    'uses' => 'ArticleController@livre',
    'as' => 'article.livre'
]);

Route::get('/itech', [
    'uses' => 'ArticleController@itech',
    'as' => 'article.itech'
]);


Route::get('/article/panier', [
    'uses' => 'ArticleController@getCart',
    'as' => 'article.panier'
]);

Route::get('/article/checkout', [
    'uses' => 'ArticleController@getCheckout',
    'as' => 'article.checkout'
]);

Route::post('/article/checkout', [
    'uses' => 'ArticleController@postCheckout',
    'as' => 'article.postCheckout'
]);

Route::get('/home', [
    'uses' => 'HomeController@index',
    'as' => 'home'
]);

Route::get('/article/reducebyone/{id}', [
    'uses' => 'ArticleController@reduceByOne',
    'as' => 'article.reduce'
]);

Route::get('/article/delete/{id}', [
    'uses' => 'ArticleController@deleteProduct',
    'as' => 'article.delete'
]);

Route::auth();

Route::get('acceuil', function(){
    return view('acceuil');
});


Route::get('service', function(){
    return view('service');
});


Route::get('recherche', function(){
    return view('recherche');
});


Route::get('details', function(){
    return view('details');
});


Route::get('inscription', function(){
    return view('inscription');
});



//routes du crud cv
Route::get('cvs', 'CvController@index');
Route::get('cvs/create', 'CvController@create');
Route::post('cvs', 'CvController@store');
Route::get('cvs/{id}/edit', 'CvController@edit');
Route::put('cvs/{id}', 'CvController@update');
Route::delete('cvs/{id}', 'CvController@destroy');
Route::post('search', 'CvController@search');



// Route::any('/search',function(){
//     $q = Input::get ( 'q' );
//     $cv = Cv::where('title','LIKE','%'.$q.'%')->orWhere('presentation','LIKE','%'.$q.'%')->get();
//     if(count($cv) > 0)
//         return view('cv.index')->withDetails($cv)->withQuery ( $q );
//     else return view ('cv.index')->withMessage('No Details found. Try to search again !');
// });





//routes du crud boutique
Route::get('boutique', 'BoutiqueController@index');
Route::get('boutique/index2', 'BoutiqueController@index2');
Route::get('boutique/create', 'BoutiqueController@create');
Route::post('boutique', 'BoutiqueController@store');
Route::get('boutique/{id}/edit', 'BoutiqueController@edit');
Route::put('boutique/{id}', 'BoutiqueController@update');
Route::delete('boutique/{id}', 'BoutiqueController@destroy');
Route::get('boutique/{id}/show', 'BoutiqueController@show');
Route::get('boutique/getarticles', 'BoutiqueController@getArticles');
Route::get('boutique/{id}/addArticle', 'BoutiqueController@addArticle');
Route::post('addArticle2', 'BoutiqueController@addArticle2');
Route::get('boutique/{id}/detailArticle', 'BoutiqueController@detailArticle');
Route::get('boutique/{id}/search', 'BoutiqueController@search');
Route::post('search/{id}', 'BoutiqueController@search');



//routes du crud article
Route::get('article', 'ArticleController@index');
Route::get('article/create', 'ArticleController@create');
Route::post('article', 'ArticleController@store');
Route::get('article/{id}/edit', 'ArticleController@edit');
Route::put('article/{id}', 'ArticleController@update');
Route::delete('article/{id}', 'ArticleController@destroy');



Route::get('/autocomplete',array('as'=>'autocomplete','uses'=>'BoutiqueController@autocomplete'));

//Route::post('search_code', 'BoutiqueController@search_code');




