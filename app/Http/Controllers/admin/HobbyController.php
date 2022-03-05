<?php

namespace App\Http\Controllers\admin;

use App\Models\Hobby;
use App\Http\Requests\StoreHobbyRequest;
use App\Http\Requests\UpdateHobbyRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class HobbyController extends Controller
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
     * @param  \App\Http\Requests\StoreHobbyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreHobbyRequest $request)
    {
        try{
            Hobby::query()->create($request->all());
            return back()->with('status','your Hobby has been inserted !!');
        }
        catch(Exception $ex){
            return back()->with('failed',"operation failed");
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateHobbyRequest  $request
     * @param  \App\Models\Hobby  $hobby
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHobbyRequest $request, Hobby $hobby)
    {
        try{
            $data = $request->all();

            $hobby->update($data);

            return back()->with('status','your Hobby has been updated !!');
        }
        catch(Exception $ex){
            return back()->with('failed',"operation failed");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hobby  $hobby
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hobby $hobby)
    {
        try{
            $data = $request->all();

            $hobby->update($data);

            return back()->with('status','your Hobby has been deleted !!');
        }
        catch(Exception $ex){
            return back()->with('failed',"operation failed");
        }
    }
}
