<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blog = Blog::orderBy('id','desc')->paginate(5);
        return view('blog.index', compact('blog'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        return view('blog.create');
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
        ]);
        
        Blog::create($request->post());

        return redirect()->route('blog.index')->with('success','blog has been created successfully.');
    }

    /**
    * Display the specified resource.
    *
    * @param  \App\blog  $blog
    * @return \Illuminate\Http\Response
    */
    public function show(Blog $blog)
    {
        return view('blog.show',compact('blog'));
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\blog  $blog
    * @return \Illuminate\Http\Response
    */
    public function edit(Blog $blog)
    {
        return view('blog.edit',compact('blog'));
    }

    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
        ]);
        
        $blog->fill($request->post())->save();

        return redirect()->route('blog.index')->with('success','blog Has Been updated successfully');
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect()->route('blog.index')->with('success','blog has been deleted successfully');
    }
}
