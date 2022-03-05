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
        return view('admin.hobbies');
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
            $data = $request->all();

            if($request->hasfile('photo_hobby')){
                $photo_hobby = $request->file('photo_hobby');
                $photo_hobbies = time().'.'.$photo_hobby->extension();
                $photo_hobby->storeAs('public/website/hobbies/',$photo_hobbies);
            }

            Hobby::query()->create([
                'name_hobby' => $data['name_hobby'],
                'photo_hobby' => $photo_hobbies,
                'user_id' => $data['user_id'],
                'created_at' =>now()
            ]);

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
            if(\File::exists(public_path('storage/website/hobbies/'.$hobby->photo_hobby))){
                \File::delete(public_path('storage/website/hobbies/'.$hobby->photo_hobby));
            }

            $photo_hobies = '';
            if($request->hasfile('photo_hobby')){
                $photo_hobby = $request->file('photo_hobby');
                $photo_hobies = time().'.'.$photo_hobby->extension();
                $photo_hobby->storeAs('public/website/hobbies/',$photo_hobies);
            }

            $hobby->update([
                'name_hobby' => $data['name_hobby'],
                'photo_hobby' => $photo_hobies,
                'user_id' => $data['user_id'],
                'created_at' =>now()
            ]);

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
            if(\File::exists(public_path('storage/website/hobbies/'.$hobby->photo_hobby))){
                \File::delete(public_path('storage/website/hobbies/'.$hobby->photo_hobby));
            }

            $hobby->delete();

            return back()->with('status','your Hobby has been deleted !!');
        }
        catch(Exception $ex){
            return back()->with('failed',"operation failed");
        }
    }
}
