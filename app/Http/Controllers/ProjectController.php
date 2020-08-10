<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{


    protected $project = null;
    public function __construct(Project $project){
        $this->project = $project;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $projectData = Project::paginate(5);

        return view('admin.project')->with('projectData', $projectData);
         
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
    public function store(Request $request)
    {
        $rules = $this->project->getRules();
        $request->validate($rules);

        $data = $request->all();

        $this->project->fill($data);
        $status = $this->project->save();
        if($status){
            $request->session()->flash('success','project added successfully');
        }else{
             $request->session()->flash('error','project not added ');

        }
        return redirect()->route('project.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $this->project =$this->project->find($id);
         //dd($this->project);
        if(!$this->project){
            request()->session()->flash('error', 'project not found.');
            return redirect()->route('project.index');
        }
        $success = $this->project->delete($id);
        if($success){
            
            request()->session()->flash('success','project deleted successfully.');
        }else{
             request()->session()->flash('error',' sorry !project not deleted.');
        }
         return redirect()->route('project.index');
    }
}
