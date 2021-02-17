<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\Http\Requests\ArticleRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::all();
        $articles=Article::with('category')->get();
        return view('welcome',compact(['articles','categories']));
    }
    public function indexFilter($name){
        $categories=Category::all();
        $articles=Article::with('category')->whereHas('category', function ($query) use (&$name) {
            $query->where('name', $name);
        })->get();
        return view('welcome',compact(['articles','categories']));
    }
    public function detail($id){
        $categories=Category::all();
        $articles=Article::where('id',$id)->first();
        return view('detail',compact(['articles','categories']));
    }
    public function createPage(){
        $categories=Category::all();
        return view('create-blog',compact(['categories']));
    }
    public function manage(){
        $categories=Category::all();
        if(Auth::user()->role=="admin"){
            $articles=Article::all();
        }
        else{
            $articles=Article::where('user_id',Auth::user()->id)->get();
        }
        return view('manage-blog',compact(['articles','categories']));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        $category=Category::where('name',$request->category)->first();
        $article=new Article();
        $article->title=$request->title;
        $article->description=$request->desc;
        $article->user_id=Auth::user()->id;
        $article->category_id=$category->id;
        $path = Storage::putFile('public/assets/', $request->file('photo'));

        $filename=explode("/",$path);
        $article->image=$filename[count($filename)-1];
        $article->save();
        return back()->with('success', 'Successfully created blog');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $article=Article::where('id',$id)->where('user_id',Auth::user()->id);
        if($article){
            $article->delete();
        }
        else{
            abort(403);
        }
        return back();
    }
}
