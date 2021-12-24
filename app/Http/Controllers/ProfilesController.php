<?php

namespace App\Http\Controllers;

use App\Models\University;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;
use SebastianBergmann\Environment\Console;

class ProfilesController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($username)
    {
        if (User::where('username', '=', $username)->exists()) {
            $user = User::where('username', '=', $username)->firstOrFail();
            $universities = University::get(['name']);
            $profile = $user->profile;
            return view('content.user.profile', compact('user', 'universities', 'profile'));
        }
        return view('content.user.profile_failed', compact('username'));
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
        $profile = User::find($request['user_id'])->profile;
        $profile->university_name = $request['university_name'];
        $profile->description = $request['description'];
        $profile->save();
        
        return ['new_university_name' => $request['university_name'], 'new_description' => $request['description']];
    }
}
