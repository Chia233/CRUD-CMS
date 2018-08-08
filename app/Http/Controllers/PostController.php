<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Deliver;
use DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	
    public function index()
    {
		//fetch post and order by role, decending; show 1 result per page
		$posts = Post::orderBy('role','desc')->simplePaginate(1);
        return view('posts/index')->with('posts', $posts);
		
	    //fetch all data with eloquent
		//$posts =  Post::all();
		
		//fetch post and order by role, decending; show 1 result per page
		//$posts = Post::orderBy('role','desc')->paginate(1);
			
		//eloquent model to limit posts(take only one post from the result)
		//$posts= Post::orderBy(role','desc')->take(1)->get();
		
		//eloquent model to "GET post OrderBy role DESC"
		//$post= Post::orderBy('role','desc')->get();
		
		//eloquent model to use conditionals "GET post WHERE userName='Timmmy' "
		//$post= Post::where('userName', 'Timmy')->get();
		
		//using DB library to use normal mySQL query
		//$post= DB::select('SELECT　* FROM posts');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		//$tests=DB::select('SELECT * FROM posts WHERE role = "Teacher"');
		$tests= Post::where('role', 'Teacher')->get();
		$student= Post::where('role', 'Student')->get();

        return view('posts/create')->with('tests', $tests)->with('student', $student);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
		'title' => 'required',
		'type' => 'required',
		'teacher' => 'required',
		'student' => 'required',
		]);
		
		//create post
		$post = new Deliver;
		$post->classTitle = $request->input('title');
		$post->type = $request->input('type');
		$post->currentTeacher = $request->input('teacher');
		$post->userName = $request->input('student');
		$post->save();
		
		return redirect('/posts')->with('success', 'A classroom has been created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post= Post::find($id);
		return view('posts/show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
		return view('posts/edit')->with('post',$post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
