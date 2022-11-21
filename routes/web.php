<?php
//use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use App\Models\Etudiant;
use App\Models\Student;
use App\Http\Controllers\CreateController ;
use App\Http\Controllers\EtudiantPostController ;
use App\Http\Controllers\CustomAuthController ;
use App\Http\Controllers\BlogPostController ;
use App\Http\Controllers\LocalizationController;

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


Route::get('/query', [BlogPostController::class, 'query'])->name('blog.query');



Route::get('/index', [EtudiantPostController::class, 'index'])->name('index');

// Etudiant Route 
Route::get('etudiant/{id}', [EtudiantPostController::class, 'show'])->name('etudiant');
Route::get('/etudiant-create', [CreateController::class, 'create'])->name('etudiant.add');
Route::post('/etudiant-create', [CreateController::class, 'store'])->name('etudiant.store');
Route::get('/etudiant-edit/{etudiant}', [EtudiantPostController::class, 'edit'])->name('etudiant.edit');
Route::put('/etudiant-edit/{etudiant}', [EtudiantPostController::class, 'update'])->name('etudiant.edit');
Route::delete('/etudiant-edit/{etudiant}', [EtudiantPostController::class, 'destroy'])->name('etudiant.destroy');


// Etudiant Blog 
Route::get('/forum', [BlogPostController::class, 'index'])->name('blog.forum');
Route::get('blog/{id}', [BlogPostController::class, 'show'])->name('etudiant');
Route::get('/blog-create', [BlogPostController::class, 'create'])->name('blog.create');
Route::post('/blog-create', [BlogPostController::class, 'store'])->name('blog.store');
Route::get('/blog-edit/{user}', [BlogPostController::class, 'edit'])->name('blog.edit');
Route::put('/blog-edit/{user}', [BlogPostController::class, 'update'])->name('blog.edit');
Route::delete('/blog-edit/{user}', [BlogPostController::class, 'destroy'])->name('blog.destroy');




Route::get('/query', [BlogPostController::class, 'query'])->name('blog.query');


Route::get('/login', [CustomAuthController::class, 'index'])->name('login');
Route::post('/login', [CustomAuthController::class, 'authentication'])->name('login.authentication');

Route::get('/registration', [CustomAuthController::class, 'create'])->name('user.registration');



Route::post('/registration-store', [CustomAuthController::class, 'store'])->name('user.store');

Route::get('/dashboard', [CustomAuthController::class, 'dashboard'])->name('dashboard');

Route::get('/logout', [CustomAuthController::class, 'logout'])->name('logout');


Route::get('/lang/{locale}', [LocalizationController::class, 'index'])->name('lang');

/* 

Route::get('etudiant/{id}', function ($id) {

    // Trouver $student par le slug et le passer dans la view 'student'

    $etudiant = Etudiant::find($id);

    return view('etudiant',[
        'etudiant'=> Etudiant::find($id)
       
    ]);
 

})->where('etudiant', '[A-z_\-]+') ; // = wherenumber


*/