<?php

namespace App\Http\Controllers\admin;

use Exception;
use Illuminate\Http\Request;
use App\Models\WorkExprience;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreWorkExprienceRequest;
use App\Http\Requests\UpdateWorkExprienceRequest;

class WorkExprienceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.workExperiences');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.add-workExperiences');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreWorkExprienceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWorkExprienceRequest $request)
    {
        try{
            WorkExprience::query()->create($request->all());
            return back()->with('status','your Work Experience has been inserted !!');
        }
        catch(Exception $ex){
            return back()->with('failed',"operation failed");
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateWorkExprienceRequest  $request
     * @param  \App\Models\WorkExprience  $workExprience
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWorkExprienceRequest $request,WorkExprience $workExprience)
    {
        try{
            $data = $request->all();

            $workExprience->update($data);

            return back()->with('status','your Work Experience has been updated !!');
        }
        catch(Exception $ex){
            return back()->with('failed',"operation failed");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WorkExprience  $workExprience
     * @return \Illuminate\Http\Response
     */
    public function destroy(WorkExprience $workExprience)
    {
        try{
            $workExprience->delete();
            return back()->with('status','your Work Experience has been deleted !!');
        }
        catch(Exception $ex){
            return back()->with('failed',"operation failed");
        }
    }
}
