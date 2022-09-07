<?php

namespace App\Http\Controllers;

use App\DataTables\WorkplaceDataTable;
use App\Models\Workplace;
use Illuminate\Support\Facades\Route;
use App\Http\Requests\StoreWorkplaceRequest;
use App\Http\Requests\UpdateWorkplaceRequest;
use Yajra\Datatables\Datatables;

class WorkplaceController extends Controller
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
        return view('admin.workplaces.index', compact('breadcrumbs_route', 'breadcrumbs_object'));
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function indexApi()
    {
        return Datatables::of(Workplace::query())->make(true);
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
     * @param  \App\Http\Requests\StoreWorkplaceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWorkplaceRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Workplace  $workplace
     * @return \Illuminate\Http\Response
     */
    public function show(Workplace $workplace)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Workplace  $workplace
     * @return \Illuminate\Http\Response
     */
    public function edit(Workplace $workplace)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateWorkplaceRequest  $request
     * @param  \App\Models\Workplace  $workplace
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWorkplaceRequest $request, Workplace $workplace)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Workplace  $workplace
     * @return \Illuminate\Http\Response
     */
    public function destroy(Workplace $workplace)
    {
        //
    }
}
