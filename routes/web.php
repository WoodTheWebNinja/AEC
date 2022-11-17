<?php
//use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use App\Models\Etudiant;
use App\Models\Student;
use App\Http\Controllers\CreateController ;
use App\Http\Controllers\EtudiantPostController ;


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





Route::get('/index', [EtudiantPostController::class, 'index'])->name('index');
Route::get('etudiant/{id}', [EtudiantPostController::class, 'show'])->name('etudiant');
Route::get('/etudiant-create', [CreateController::class, 'create'])->name('etudiant.add');
Route::post('/etudiant-create', [CreateController::class, 'store'])->name('etudiant.store');
Route::get('/etudiant-edit/{etudiant}', [EtudiantPostController::class, 'edit'])->name('etudiant.edit');
Route::put('/etudiant-edit/{etudiant}', [EtudiantPostController::class, 'update'])->name('etudiant.edit');
Route::delete('/etudiant-edit/{etudiant}', [EtudiantPostController::class, 'destroy'])->name('etudiant.destroy');


/* 

Route::get('etudiant/{id}', function ($id) {

    // Trouver $student par le slug et le passer dans la view 'student'

    $etudiant = Etudiant::find($id);

    return view('etudiant',[
        'etudiant'=> Etudiant::find($id)
       
    ]);
 

})->where('etudiant', '[A-z_\-]+') ; // = wherenumber


*/