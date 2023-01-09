<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Leader;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.project',[
            'projects'=>Project::latest()->paginate(10),
            
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create',[
            'leaders'=>Leader::all(),
        ]);

        return $request->all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData=$request->validate([
            'project_name' => 'required',
            'client' => 'required',
            'leader_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'progress' => 'required',
        ]);

        Project::create($validatedData);
        return redirect('/project')->with('pesan','Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(project $project)
    {
        return view('admin.edit',[
            'projects' => $project,
            'leaders' => Leader::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, project $project)
    {
        $validatedData=$request->validate([
            'project_name' => 'required',
            'client' => 'required',
            'leader_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'progress' => 'required',

        ]);
       
        Project::where('id',$project->id)->update($validatedData);
        return redirect('/project')->with('pesan','Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(project $project)
    {
        Project::destroy($project->id);
        return redirect('/project')->with('pesan','Data berhasil dihapus');
    }
}
