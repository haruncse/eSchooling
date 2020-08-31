<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\post;
use Auth;

class PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('post.post');
    }

    public function postQuestion(Request $request)
    {
        //dd($request->postData);
        $postTable=new post();
        $postTable->userID=Auth::user()->id;
        $postTable->title=$request->title;
        $postTable->postData=$request->postData;
        $postTable->save();
        \Session::flash('flash_message','Your have successfully post your Question.'); //<--FLASH MESSAGE
        return redirect('/ask-questions');
        //dd($request->postData);
    }

    public function viewQuestion()
    {
        //dd($request->postData);
        $allPostByUser=post::where('userID','=',Auth::user()->id)->get();
        //dd($allPostByUser);
        return view('post.viewPost',['posts'=>$allPostByUser]);
        
    }
}
