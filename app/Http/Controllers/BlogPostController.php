<?php

namespace App\Http\Controllers;
use App\Models\Etudiant;
use App\Models\BlogPost;
use App\Models\User;
use Illuminate\Http\Request;
use DB;

class BlogPostController extends Controller
{
    public function index()
    {
    
       // if(Auth::check()){
            $posts = BlogPost::all();
        // return $posts; 
        // $posts = BlogPost::select()->where("user_id", "=" ,"1")->get();
        return  view('blog.forum', ['posts' => $posts]); 
      //  }
     //   return redirect(route('login'))->withErrors('Pas autorise');
    }






    public function query(){
       
       
        $blog = BlogPost::select(DB::raw('count(*) as blogs'), 'user_id')
        ->groupby('user_id')
        ->get();

        $blog = BlogPost::select()
        ->limit(4)
        ->get();



    //return $blog;

    $blog = BlogPost::Select()
    ->paginate(5);

    return view('blog.page', ['blogs' => $blog]);
    
        
    }



// Add student part 1 (Formulaire)
public function create(){
    $user = new User;
    $user = $user->id ;
    return view('blog.create', ['user' =>  $user]);
}

// Add DB part 2

public function store(Request $request)
{
    //print_r($_POST);
    
    $newEtudiant = Etudiant::create([
        'nom' => $request->nom,
        'adresse' => $request->adresse,
        'phone' => $request->phone,
        'email' => $request->email,
        'date_de_naissance' => $request->date_de_naissance,
        'villeID' => $request->villes_id
       
    ]);
        
    return redirect(route('etudiant', $newEtudiant->id));
}











}
