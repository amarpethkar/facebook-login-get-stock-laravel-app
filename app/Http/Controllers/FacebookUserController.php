<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\FacebookUsers;
use DB;

class FacebookUserController extends Controller
{
    /**
     * Display a listing of the current logged in user. If user is not present at DB create a user record @ facebook user table else get the existing user's details
     *
     * @return \Illuminate\Http\Response of current logged in user. 
     */
    public function checkFacebookUser(Request $request)
    {
        $data = $request->all();
        #create or update your data here
        $sqlResult = FacebookUsers::where('user_email', $data['email'])->first();
        if($sqlResult) {
            return array('status' => 'success', "currentUser"=>$sqlResult);
        } else {
            $user = new FacebookUsers;
            $user->user_email = $data['email'];
            $user->user_name = $data['name'];
            $user->user_fb_id = $data['userId'];
            $user->save();
            
            $newUser = FacebookUsers::where('user_email', $data['email'])->first();
            
            return array('status' => 'success', "currentUser"=>$newUser);
        }
    }

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
