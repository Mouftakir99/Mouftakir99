<?php

namespace App\Http\Controllers\admin;

use Faker\Core\File;
use App\Models\Setting;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSettingRequest;
use App\Http\Requests\UpdateSettingRequest;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.setting');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSettingRequest  $request
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSettingRequest $request, $setting)
    {
        try{
            $data = $request->all();

            if(\File::exists(public_path('storage/website/favicon/'.$setting->logo_website))){
                \File::delete(public_path('storage/website/favicon/'.$setting->logo_website));
            }

            if(\File::exists(public_path('storage/website/favicon/'.$setting->favicon_website))){
                \File::delete(public_path('storage/website/favicon/'.$setting->favicon_website));
            }

            if($request->hasfile('logo_website')){
                $logo = $request->file('logo_website');
                $logoWeb = time().'.'.$logo->extension();
                $logo->storeAs('public/website/logo',$logoWeb);
            }

            if($request->hasfile('favicon_website')){
                $favicon = $request->file('favicon_website');
                $faviconWeb = time().'.'.$favicon->extension();
                $favicon->storeAs('public/website/favicon',$faviconWeb);
            }

            Setting::query()->updateOrCreate([ 'user_id' => $setting],
            [
                'name_website' => 'name_website',
                'favicon_website' => $faviconWeb,
                'logo_website' => $logoWeb,
            ]);

            return back()->with('status','your Setting has been updated !!');
        }
        catch(Exception $ex){
            return back()->with('failed',"operation failed");
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        try{
            $setting->delete();
            return back()->with('status','your Setting has been deleted !!');
        }
        catch(Exception $ex){
            return back()->with('failed',"operation failed");
        }
    }
}
