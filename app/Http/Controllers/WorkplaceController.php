<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Workplace;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use App\Http\Requests\StoreWorkplaceRequest;
use App\Http\Requests\UpdateWorkplaceRequest;

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
        $data = Workplace::select("id", "instance_name");

        if($request->has('search')){
            $search = $request->search;
            $data = $data->where('instance_name','LIKE',"%$search%");
        }

        $data = $data->paginate(10);
        return response()->json($data);
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function indexApi()
    {
        return Datatables::of(Workplace::query())
            ->editColumn('date_join', function ($workplace) {
               $date = Carbon::createFromFormat('Y-m-d', $workplace->date_join);
               return $date->format('d-m-Y');
                
            })
            ->editColumn('date_leave', function ($workplace) {
                if (!$workplace->date_leave) {
                    return "";
                }
                $date = Carbon::createFromFormat('Y-m-d', $workplace->date_leave);
                return $date->format('d-m-Y');
            })
            ->addColumn('Action', function ($workplace) {
                return '
                <div class="col-auto">
                        <a href="#" onclick="EditWorkplace('.$workplace->id.')" class="text-decoration-none">
                            <button class="btn btn-warning" type="button">
                                <i class="icon icon-2xl cil-pen"></i>
                            </button>
                        </a>
                        <a href="#" onclick="DeleteWorkplace('.$workplace->id.')" class="text-decoration-none">
                            <button class="btn btn-danger btn delete" type="submit">
                                <i class="icon icon-2xl cil-trash"></i>
                            </button>
                        </a>
                    </div>
                ';
            })
            ->rawColumns(['Action'])
            ->make(true);
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
        $path = $this->storeLogo($request);

        $workplace = Workplace::create([
            'instance_name' => $request->instance_name,
            'city' => $request->city,
            'position' => $request->position,
            'description' => $request->description,
            'date_join' => Carbon::createFromFormat('d/m/Y', $request->date_join)->format('Y-m-d'),
            'date_leave' => $request->date_leave ? Carbon::createFromFormat('d/m/Y', $request->date_leave)->format('Y-m-d') : null,
            'is_current_workplace' => $request->is_current_workplace ? true : false,
            'order' => $request->order,
            'logo' => $path,
        ]);

        if (!$workplace) {
            //App::abort(500, 'Some Error');
            return Response::json(array(
                'code'      =>  500,
                'message'   =>  'Failed to save data'
            ), 500);
        }

        return Response::json(array(
            'code'      =>  200,
            'message'   =>  'Success'
        ), 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Workplace  $workplace
     * @return \Illuminate\Http\Response
     */
    public function show(Workplace $workplace)
    {
        return $workplace;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Workplace  $workplace
     * @return \Illuminate\Http\Response
     */
    public function edit(Workplace $workplace)
    {
        return $workplace;
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
        $workplace->instance_name = $request->instance_name;
        $workplace->city = $request->city;
        $workplace->position = $request->position;
        $workplace->description = $request->description;
        $workplace->date_join = Carbon::createFromFormat('d/m/Y', $request->date_join)->format('Y-m-d');
        $workplace->date_leave = $request->date_leave ? Carbon::createFromFormat('d/m/Y', $request->date_leave)->format('Y-m-d') : null;
        $workplace->order = $request->order;
        $workplace->is_current_workplace = $request->is_current_workplace ? true : false;
        if($request->logo) {
            $path = $this->storeLogo($request);
            $workplace->logo = $path;
        }
        
        if (!$workplace->save()) {
            //App::abort(500, 'Some Error');
            return Response::json(array(
                'code'      =>  500,
                'message'   =>  'Failed to save data'
            ), 500);
        }

        return Response::json(array(
            'code'      =>  200,
            'message'   =>  'Success'
        ), 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Workplace  $workplace
     * @return \Illuminate\Http\Response
     */
    public function destroy(Workplace $workplace)
    {
        $delete = $workplace->delete();

        if (!$delete) {
            //App::abort(500, 'Some Error');
            return Response::json(array(
                'code'      =>  500,
                'message'   =>  'Failed to delete data'
            ), 500);
        }

        return Response::json(array(
            'code'      =>  200,
            'message'   =>  'Success'
        ), 200);
    }

    private function storeLogo($request){
        $path = null;
        // save the image if exists
        if ($request->logo) {
            $file_name = $request->file('logo')->getClientOriginalName();
            $random_folder_name = Str::uuid()->toString();
            $path = $random_folder_name . '/' . $file_name;

            if(!Storage::disk('public')->put($path, $request->file('logo')->get())) {
                App::abort(500, array(
                    'code'      =>  500,
                    'message'   =>  'Failed to save uploaded file'
                ));
            }
        }
        return $path ? Storage::url($path) : null;
    }
}
