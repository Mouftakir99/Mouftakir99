<?php

namespace App\Http\Controllers\admin;

use App\Models\Languague;
use App\Http\Requests\StoreLanguagueRequest;
use App\Http\Requests\UpdateLanguagueRequest;

class LanguagueController extends Controller
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
     * @param  \App\Http\Requests\StoreLanguagueRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLanguagueRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Languague  $languague
     * @return \Illuminate\Http\Response
     */
    public function show(Languague $languague)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Languague  $languague
     * @return \Illuminate\Http\Response
     */
    public function edit(Languague $languague)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLanguagueRequest  $request
     * @param  \App\Models\Languague  $languague
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLanguagueRequest $request, Languague $languague)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Languague  $languague
     * @return \Illuminate\Http\Response
     */
    public function destroy(Languague $languague)
    {
        //
    }
}
