<?php

namespace App\Http\Controllers\admin;

use App\Models\Languague;
use App\Http\Requests\StoreLanguagueRequest;
use App\Http\Requests\UpdateLanguagueRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LanguagueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.languages');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLanguagueRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLanguagueRequest $request)
    {
        try{
            Languague::query()->create($request->all());
            return back()->with('status','your languague has been inserted !!');
        }
        catch(Exception $ex){
            return back()->with('failed',"operation failed".$ex);
        }
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
        try{
            $data = $request->all();

            $languague->update($data);

            return back()->with('status','your languague has been updated !!');
        }
        catch(Exception $ex){
            return back()->with('failed',"operation failed");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Languague  $languague
     * @return \Illuminate\Http\Response
     */
    public function destroy(Languague $languague)
    {
        try{
            $languague->delete();
            return back()->with('status','your languague has been deleted !!');
        }
        catch(Exception $ex){
            return back()->with('failed',"operation failed");
        }
    }
}
