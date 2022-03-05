<?php

namespace App\Http\Controllers\admin;

use App\Models\ExtraSkill;
use App\Http\Requests\StoreExtraSkillRequest;
use App\Http\Requests\UpdateExtraSkillRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ExtraSkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.extraSkills');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreExtraSkillRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreExtraSkillRequest $request)
    {
        try{
            ExtraSkill::query()->create($request->all());
            return back()->with('status','your ExtraSkill has been inserted !!');
        }
        catch(Exception $ex){
            return back()->with('failed',"operation failed");
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateExtraSkillRequest  $request
     * @param  \App\Models\ExtraSkill  $extraSkill
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateExtraSkillRequest $request, ExtraSkill $extraSkill)
    {
        try{
            $data = $request->all();

            $extraSkill->update($data);

            return back()->with('status','your ExtraSkill has been updated !!');
        }
        catch(Exception $ex){
            return back()->with('failed',"operation failed");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ExtraSkill  $extraSkill
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExtraSkill $extraSkill)
    {
        try{
            $data = $request->all();

            $extraSkill->delete();

            return back()->with('status','your ExtraSkill has been updated !!');
        }
        catch(Exception $ex){
            return back()->with('failed',"operation failed");
        }
    }

}
