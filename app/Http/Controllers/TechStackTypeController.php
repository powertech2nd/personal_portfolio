<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TechStackType;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreTechStackTypeRequest;
use App\Http\Requests\UpdateTechStackTypeRequest;

class TechStackTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $techStackTypes = TechStackType::paginate(10);
        $breadcrumbs_route = Route::currentRouteName();
        $breadcrumbs_object = null;
        return view('admin.techStackTypes.index', compact('techStackTypes', 'breadcrumbs_route', 'breadcrumbs_object'));
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
        $data = TechStackType::select("id", "name");

        if($request->has('search')){
            $search = $request->search;
            $data = $data->where('name','LIKE',"%$search%");
        }

        $data = $data->paginate(2);
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
        return view('admin.techStackTypes.form', compact('form_state', 'breadcrumbs_route', 'breadcrumbs_object'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTechStackTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTechStackTypeRequest $request)
    {
        TechStackType::create($request->all());

        Session::flash('global_success_alert_msg', 'Success create data');
        Session::flash('global_success_alert_class', 'alert-success');
        return redirect()->route('techStackTypes.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TechStackType  $techStackType
     * @return \Illuminate\Http\Response
     */
    public function show(TechStackType $techStackType)
    {
        return $techStackType;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TechStackType  $techStackType
     * @return \Illuminate\Http\Response
     */
    public function edit(TechStackType $techStackType)
    {
        $form_state = "update";
        $breadcrumbs_route = Route::currentRouteName();
        $breadcrumbs_object = $techStackType;
        return view('admin.techStackTypes.form', compact('form_state', 'techStackType', 'breadcrumbs_route', 'breadcrumbs_object'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTechStackTypeRequest  $request
     * @param  \App\Models\TechStackType  $techStackType
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTechStackTypeRequest $request, TechStackType $techStackType)
    {
         $techStackType->fill($request->all());
         $techStackType->save();

         Session::flash('global_success_alert_msg', 'Success update data');
         Session::flash('global_success_alert_class', 'alert-success');
         return redirect()->route('techStackTypes.edit', $techStackType->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TechStackType  $techStackType
     * @return \Illuminate\Http\Response
     */
    public function destroy(TechStackType $techStackType)
    {
        $techStackType->delete();

        Session::flash('global_success_alert_msg', 'Sucess delete data');
        Session::flash('global_success_alert_class', 'alert-success');
        return redirect()->route('techStackTypes.index');
    }
}
