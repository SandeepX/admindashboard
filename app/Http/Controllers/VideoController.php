<?php

namespace App\Http\Controllers;

use App\Video;
use Illuminate\Http\Request;
use File;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videodata = Video::paginate(5);
        return view('admin.video')
        ->with('videodata', $videodata);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        $data = new Video;

        if ($request->hasFile('video')) {
            $validated = $request->validate([
                'title' => 'required|string|max:40',
                'video'          =>'mimes:mpeg,ogg,mp4,webm,3gp,mov,flv,avi,wmv,ts|max:20480|required'
                
            ]);
            
            if ($request->file('video')->isValid()) {
                $upload_dir = public_path().'/uploads/video' ;
                if(!File::exists($upload_dir)){
                    File::makeDirectory($upload_dir,0777,true,true);
                }
                
                $file_name = "Video-".date('Ymdhis').rand(0,999).".".$request->video->getClientOriginalExtension();
                $success = $request->video->move($upload_dir, $file_name);

                if($success){
                    $data['url'] = $file_name;
                }else{
                    $data['url'] = null;
                }

                $file = Video::create([
                   'title' => $validated['title'],
                    'filename' => $file_name,
                    
                ]);
                if($file){
                    $request->session()->flash('success','video added successfully');
                }else{
                    $request->session()->flash('error','opps! video not uploaded');
                }
                
                return redirect()->route('video.index');
               
            }
        }
        abort(500, 'Could not upload image :(');
    } 



    /**
     * Display the specified resource.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Video $video)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $video =Video::find($id);
         //dd($this->video);
        if(!$video){
            request()->session()->flash('error', 'video not found.');
            return redirect()->route('video.index');
        }

        $video1 = $video->filename;

        $success = $video->delete($id);
        if($success){
            if( $video1 != null && file_exists(public_path().'/uploads/video/'. $video1)){
                @unlink(public_path().'/uploads/video/'. $video1);
                   
            } 

            request()->session()->flash('success','video deleted successfully.');
        }else{
             request()->session()->flash('error',' sorry !video not deleted.');
        }
         return redirect()->route('video.index');
    }
}
