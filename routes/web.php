<?php

/*s
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

Route::get('/rail-fence-cipher/encrypt', 'RailFenceCipherController@encryptPage')->name('rail-fence-encrypt');

Route::get('/rail-fence-cipher/decrypt', 'RailFenceCipherController@decryptPage')->name('rail-fence-decrypt');

Route::post('/rail-fence-cipher/get-decrypt-file', 'RailFenceCipherController@getDecryptFile')->name('rail-fence-get-decrypt-file');

Route::post('/rail-fence-cipher/get-encrypt-file', 'RailFenceCipherController@getEncryptFile')->name('rail-fence-get-encrypt-file');

Route::get('/turning-grille-cipher/encrypt', 'TurningGrilleController@encryptPage')->name('turning-grille-encrypt');

Route::get('/turning-grille-cipher/decrypt', 'TurningGrilleController@decryptPage')->name('turning-grille-decrypt');

Route::post('/turning-grille-cipher/get-decrypt-file', 'TurningGrilleController@getDecryptFile')->name('turning-grille-get-decrypt-file');

Route::post('/turning-grille-cipher/get-encrypt-file', 'TurningGrilleController@getEncryptFile')->name('turning-grille-get-encrypt-file');
