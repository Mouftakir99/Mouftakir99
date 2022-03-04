<?php

namespace App\Http\Controllers\admin;

use App\Models\WorkExprience;
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
        //
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
     * @param  \App\Http\Requests\StoreWorkExprienceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWorkExprienceRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WorkExprience  $workExprience
     * @return \Illuminate\Http\Response
     */
    public function show(WorkExprience $workExprience)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WorkExprience  $workExprience
     * @return \Illuminate\Http\Response
     */
    public function edit(WorkExprience $workExprience)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateWorkExprienceRequest  $request
     * @param  \App\Models\WorkExprience  $workExprience
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWorkExprienceRequest $request, WorkExprience $workExprience)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WorkExprience  $workExprience
     * @return \Illuminate\Http\Response
     */
    public function destroy(WorkExprience $workExprience)
    {
        //
    }
}
