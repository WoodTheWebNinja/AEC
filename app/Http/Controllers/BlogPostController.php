<?php

namespace App\Http\Controllers;
use App\Models\Etudiant;
use App\Models\BlogPost;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class BlogPostController extends Controller
{
    public function index()
    {
    
        if(Auth::check()){
        $etudiants = Etudiant::all();
        $posts = BlogPost::all();
        // return $posts; 
         //$posts = BlogPost::select()->where("user_id", "=" ,"1")->get();
         $email = Auth::user()->email;
        return  view('blog.forum', ['posts' => $posts],  ['email' =>$email]); 

      }
        return redirect(route('login'))->withErrors('Pas autorise');
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
    $email = Auth::user()->email;
    $user_id = Auth::user()->id;
    
    return view('blog.create', ['user' =>  $user_id ]);
}

// Add DB part 2

public function store(Request $request)
{
    //print_r($_POST);
    $email = Auth::user()->email;
    $newBlog = BlogPost::create([
        'title' => $request->title,
        'body' => $request->body,
        'user_id' => $request->user_id
       
    ]);
        
    return redirect(route('forum',  $newBlog->id , ['email' =>  $email ]) );
}


public function show($id)
{
    $blog = BlogPost::find($id);    
    $email = Auth::user()->email;

    return  view('blog.show', ['blog' =>    $blog],['email' =>  $email ]);
}








}
