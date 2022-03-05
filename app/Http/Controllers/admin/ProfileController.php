<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Models\Address;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.profile');
    }

        /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{

            $request->validate([
                'current_password' => ['required', new MatchOldPassword],
                'new_password' => ['required'],
                'password_confirmation' => ['same:new_password'],
            ]);

            User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);

            return back()->with('status','your password has been updated !!');
        }
        catch(Exception $ex){
            return back()->with('failed',"operation failed");
        }
}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $data = $request->all();
            Address::query()->updateOrCreate(['user_id' => $id],
            [
                'address' => $data['address'] ?? null,
                'city' => $data['city']  ?? null,
                'country' => $data['country']  ?? null,
                'zipCode' => $data['zipCode'] ?? null,
            ]);

            User::query()->updateOrCreate(['id' => $id],
            [
                'firstName' => $data['firstName'] ?? null,
                'lastName' => $data['lastName'] ?? null,
                'birthday' => $data['birthday'] ?? null,
                'phone' => $data['phone'] ?? null,
                'about_me' => $data['about_me'] ?? null,
            ]);
            return back()->with('status','your Profile has been updated !!');
        }
        catch(Exception $ex){
            return back()->with('failed',"operation failed");
        }

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
