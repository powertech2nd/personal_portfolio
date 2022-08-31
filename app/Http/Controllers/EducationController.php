<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Education;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreEducationRequest;
use App\Http\Requests\UpdateEducationRequest;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $educations = Education::paginate(2);
        return view('admin.educations.index', compact('educations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $form_state = "create";
        return view('admin.educations.form', compact('form_state'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEducationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEducationRequest $request)
    {
        $education = Education::create([
            'instance_name' => $request->instance_name,
            'major' => $request->major,
            'city' => $request->city,
            'date_start' => Carbon::createFromFormat('d/m/Y', $request->date_start)->format('Y-m-d'),
            'date_end' => Carbon::createFromFormat('d/m/Y', $request->date_finish)->format('Y-m-d'),
            'is_currently_studying' => $request->is_currently_studying ? true : false,
        ]);


        //Education::create($request->all());

        Session::flash('global_success_alert_msg', 'Success create data');
        Session::flash('global_success_alert_class', 'alert-success');
        return redirect()->route('educations.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function show(Education $education)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function edit(Education $education)
    {
        $form_state = "update";
        return view('admin.educations.form', compact('form_state', 'education'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEducationRequest  $request
     * @param  \App\Models\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEducationRequest $request, Education $education)
    {
        $education->instance_name = $request->instance_name;
        $education->major = $request->major;
        $education->city = $request->city;
        $education->date_start = Carbon::createFromFormat('d/m/Y', $request->date_start)->format('Y-m-d');
        $education->date_finish = Carbon::createFromFormat('d/m/Y', $request->date_finish)->format('Y-m-d');
        $education->is_currently_studying = $request->is_currently_studying ? true : false;
        // $education->fill($request->allt());

        $education->save();

        Session::flash('global_success_alert_msg', 'Success update data');
        Session::flash('global_success_alert_class', 'alert-success');
        return redirect()->route('educations.edit', $education->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function destroy(Education $education)
    {
        $education->delete();

        Session::flash('global_success_alert_msg', 'Sucess delete data');
        Session::flash('global_success_alert_class', 'alert-success');
        return redirect()->route('educations.index');
    }
}
