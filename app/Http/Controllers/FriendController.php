<?php

namespace App\Http\Controllers;

use App\Friend;
use App\Profile;
use App\User;
use Illuminate\Http\Request;

class FriendController extends Controller
{
   public function showFollowers(Profile $profile) {
       $followers = $profile->followers;

       return view('profile.followers', compact('followers'));
   }

   public function showFollowed(Profile $profile) {
       $followed = $profile->followed;

       return view('profile.followed', compact('followed'));
   }
}
