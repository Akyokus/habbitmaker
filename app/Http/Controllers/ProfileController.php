<?php

namespace App\Http\Controllers;

use App\Friend;
use App\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{


    public function add_follow(Profile $profile) {

        $follow = Friend::where('user_one_id', auth()->id())->where('user_two_id', $profile->id)->first();

        if (!empty($follow->status) ) {
            $follow->status = config('friend.status.is_friend');
            $follow->save();
        } else {

            $follow = new Friend();
            $follow->user_one_id = auth()->id();
            $follow->user_two_id = $profile->id;
            $follow->status = config('friend.status.is_friend');
            $follow->action_user_id = auth()->id();
            $follow->save();

        }


        return redirect()->back();
    }

    public function unfollow(Profile $profile) {
        $follow = Friend::where('user_one_id', auth()->id())->where('user_two_id', $profile->id)->first();
        $follow->status = config('friend.status.is_not_friend');
        $follow->save();
        return redirect()->back();
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        for ($i = 10; $i < 40; $i++) {
            $follower = new Friend();
            $follower->user_one_id = $i;
            $follower->user_two_id = auth()->id();
            $follower->status = 0;
            $follower->action_user_id = $i;
            $follower->save();
        }
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
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {

        $follow = Friend::where('user_one_id', auth()->id())->where('user_two_id', $profile->id)->first();
//        TODO Collection çekiyor!
//        dd($follow[0]);
        return view('profile.show')->with('profile', $profile)->with('follow', $follow);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        return view('profile.edit', compact($profile));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
