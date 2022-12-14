<?php

namespace App\Http\Controllers;

use App\Models\TechStack;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\StoreTechStackRequest;
use App\Http\Requests\UpdateTechStackRequest;

class TechStackController extends Controller
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
        return view('admin.techStacks.index', compact('breadcrumbs_route', 'breadcrumbs_object'));
    }

    public function indexApi()
    {
        $model = TechStack::with('techStackType');

        return DataTables::eloquent($model)
            ->make(true);
    }

    /**
     * To popuate dropdown items
     *
     * @return \Illuminate\Http\Response
     */
    public function dropdownList(Request $request)
    {
        $pagination_page = 1;
        if ($request->has('page')) {
            $pagination_page =  $request->page;
        }

        $data = [];
        $data = TechStack::select("id", "name");

        if($request->has('search')){
            $search = $request->search;
            $data = $data->where('name','LIKE',"%$search%");
        }

        $data = $data->paginate(10);
        return response()->json($data);
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
        return view('admin.techStacks.form', compact('form_state', 'breadcrumbs_route', 'breadcrumbs_object'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTechStackRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTechStackRequest $request)
    {
        TechStack::create($request->all());

        Session::flash('global_success_alert_msg', 'Success create data');
        Session::flash('global_success_alert_class', 'alert-success');
        return redirect()->route('techStacks.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TechStack  $techStack
     * @return \Illuminate\Http\Response
     */
    public function show(TechStack $techStack)
    {
        //
    }

    /**
     * Shpw multiple tech stacks
     *
     * @return \Illuminate\Http\Response
     */
    public function showList(Request $request)
    {
        if (!$request->tech_stack_ids) {
            return null;
        }
        $arrIds = $request->tech_stack_ids;
        $data = TechStack::whereIn('id', $arrIds)->get();
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TechStack  $techStack
     * @return \Illuminate\Http\Response
     */
    public function edit(TechStack $techStack)
    {
        $form_state = "update";
        $breadcrumbs_route = Route::currentRouteName();
        $breadcrumbs_object = $techStack;
        return view('admin.techStacks.form', compact('form_state', 'techStack', 'breadcrumbs_route', 'breadcrumbs_object'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTechStackRequest  $request
     * @param  \App\Models\TechStack  $techStack
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTechStackRequest $request, TechStack $techStack)
    {
        $techStack->fill($request->all());

        $techStack->save();

        Session::flash('global_success_alert_msg', 'Success update data');
        Session::flash('global_success_alert_class', 'alert-success');
        return redirect()->route('techStacks.edit', $techStack->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TechStack  $techStack
     * @return \Illuminate\Http\Response
     */
    public function destroy(TechStack $techStack)
    {
        $techStack->delete();

        Session::flash('global_success_alert_msg', 'Sucess delete data');
        Session::flash('global_success_alert_class', 'alert-success');
        return redirect()->route('techStacks.index');
    }
}
