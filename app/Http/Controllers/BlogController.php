<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;
use File;

class BlogController extends Controller
{

    protected $blog = null;
    public function __construct(Blog $blog){
        $this->blog = $blog;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogData = Blog::latest()->paginate(5);
        //dd($blogData);
        return view('admin.Blog')->with('blogData',$blogData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blogcreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        
        $rules = $this->blog->getRules();
        $request->validate($rules);

        $data = $request->all();
        
       

        

        if($request->image){
            $upload_dir = public_path().'/uploads/blog' ;
            if(!File::exists($upload_dir)){
                File::makeDirectory($upload_dir,0777,true,true);
            }
            $file_name = "Blog-".date('Ymdhis').rand(0,999).".".$request->image->getClientOriginalExtension();
            $success = $request->image->move($upload_dir, $file_name);
            if($success){
                // Image::make($upload_dir."/". $file_name)-> resize(150, 150, function ($constraint) {
                //     $constraint->aspectRatio();
                // })-> save($upload_dir.'/Thumb-'.$file_name);
                $data['image'] = $file_name;
            } else{
                $data['image'] = null;
            }



        }

        $this->blog->fill($data);
        $status = $this->blog->save();
        if($status){
            $request->session()->flash('success','Blog added successfully');
        }else{
             $request->session()->flash('error','Blog not added ');

        }
        return redirect()->route('blog.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::find($id);
         //dd($this->blog);
        if(!$blog){
            request()->session()->flash('error', 'blog not found.');
            return redirect()->route('blog.index');
        }

        $blog1 = $blog->filename;

        $success = $blog->delete($id);
        if($success){
            if( $blog1 != null && file_exists(public_path().'/uploads/blog/'. $blog1)){
                @unlink(public_path().'/uploads/blog/'. $blog1);
                   
            } 

            request()->session()->flash('success','blog deleted successfully.');
        }else{
             request()->session()->flash('error',' sorry !blog not deleted.');
        }
         return redirect()->route('blog.index');
    }
}
