<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Project;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $breadcrumbs_route = Route::currentRouteName();
        $breadcrumbs_object = null;
        return view('admin.projects.index', compact('breadcrumbs_route', 'breadcrumbs_object'));
    }

    public function indexApi()
    {
        $model = Project::with(['workplace']);

        return DataTables::eloquent($model)
            ->editColumn('date_start', function($data){ 
                if (!$data->date_start) {
                    return null;
                }
                return Carbon::createFromFormat('Y-m-d', $data->date_start)->format('d-m-Y');
            })
            ->editColumn('date_finish', function($data){ 
                if (!$data->date_finish) {
                    return null;
                }
                return Carbon::createFromFormat('Y-m-d', $data->date_finish)->format('d-m-Y');
            })
            ->filterColumn('date_start', function ($query, $keyword) {
                $query->whereRaw("DATE_FORMAT(date_start,'%d-%m-%Y') like ?", ["%$keyword%"]);
            })
            ->filterColumn('date_finish', function ($query, $keyword) {
                $query->whereRaw("DATE_FORMAT(date_finish,'%d-%m-%Y') like ?", ["%$keyword%"]);
            })
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $form_state = "create";
        $breadcrumbs_route = Route::currentRouteName();
        $breadcrumbs_object = null;
        return view('admin.projects.form', compact('form_state', 'breadcrumbs_route', 'breadcrumbs_object'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        $project = Project::create($request->all());
        $project->techStacks()->attach($request->tech_stack_ids);
        $project->save();

        Session::flash('global_success_alert_msg', 'Success create data');
        Session::flash('global_success_alert_class', 'alert-success');
        return redirect()->route('projects.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $project = $project->load('workplace')->load('techStacks');

        $form_state = "update";
        $breadcrumbs_route = Route::currentRouteName();
        $breadcrumbs_object = $project;
        return view('admin.projects.form', compact('form_state', 'project', 'breadcrumbs_route', 'breadcrumbs_object'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectRequest  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $project->fill($request->all());
        $project->techStacks()->attach($request->tech_stack_ids);
        $project->save();

        Session::flash('global_success_alert_msg', 'Success update data');
        Session::flash('global_success_alert_class', 'alert-success');
        return redirect()->route('projects.edit', $project->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();

        Session::flash('global_success_alert_msg', 'Sucess delete data');
        Session::flash('global_success_alert_class', 'alert-success');
        return redirect()->route('projects.index');
    }
}
