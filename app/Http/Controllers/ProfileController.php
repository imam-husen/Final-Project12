<?php

namespace App\Http\Controllers;
use App\Models\Profile;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index() {

        $iduser = Auth::id();

        $detailprofile = Profile::where('user_id',$iduser)->first();
        
        return view('profile.index',['detailprofile'=>$detailprofile]);
    }


    public function update(Request $request,$id){
        $request->validate([
        'biodata' => 'required',
        'umur' => 'required',
        'alamat' => 'required',
        ]);

        $profile = Profile::find($id);

        $profile->biodata = $request->biodata;
        $profile->umur = $request->umur;
        $profile->alamat = $request->alamat;

        $profile->save();
        return redirect('/profile');
    }


}
