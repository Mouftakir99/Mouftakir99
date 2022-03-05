<?php

namespace App\Http\Controllers\admin;

use App\Models\Skill;
use App\Http\Requests\StoreSkillRequest;
use App\Http\Requests\UpdateSkillRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.skills');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSkillRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSkillRequest $request)
    {
        try{
            Skill::query()->create($request->all());
            return back()->with('status','your Skill has been inserted !!');
        }
        catch(Exception $ex){
            return back()->with('failed',"operation failed");
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSkillRequest  $request
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSkillRequest $request, Skill $skill)
    {
        try{
            $skill->update($request->all());
            return back()->with('status','your Skill has been updated !!');
        }
        catch(Exception $ex){
            return back()->with('failed',"operation failed");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function destroy(Skill $skill)
    {
        try{
            $skill->delete();
            return back()->with('status','your Skill has been deleted !!');
        }
        catch(Exception $ex){
            return back()->with('failed',"operation failed");
        }
    }
}
