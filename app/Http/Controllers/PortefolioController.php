<?php

namespace App\Http\Controllers;

use App\Models\Portefolio;
use App\Http\Requests\StorePortefolioRequest;
use App\Http\Requests\UpdatePortefolioRequest;

class PortefolioController extends Controller
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
     * @param  \App\Http\Requests\StorePortefolioRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePortefolioRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Portefolio  $portefolio
     * @return \Illuminate\Http\Response
     */
    public function show(Portefolio $portefolio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Portefolio  $portefolio
     * @return \Illuminate\Http\Response
     */
    public function edit(Portefolio $portefolio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePortefolioRequest  $request
     * @param  \App\Models\Portefolio  $portefolio
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePortefolioRequest $request, Portefolio $portefolio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Portefolio  $portefolio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Portefolio $portefolio)
    {
        //
    }
}
