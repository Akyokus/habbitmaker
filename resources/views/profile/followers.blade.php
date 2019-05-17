@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach($followers as $follower)
                <div class="col-4">
                   <div class="card">
                       <img class="card-img-top" src="{{ asset('storage/images/'.$follower->user_one->profile->avatar) }}" alt="">
                       <div class="card-header">
                           <h5 class="">{{ $follower->user_one->name }}</h5>
                       </div>
                       <div class="card-body">
                           @if ($follower->user_one->profile->biography)
                               <p class="card-text">{{ $follower->user_one->profile->biography }}</p>
                           @else
                               <p class="card-text">There is no biography</p>
                           @endif
                               <a class="btn btn-block btn-primary" href="{{ route('profile.show', $follower->user_one->profile) }}">Show Profile</a>
                       </div>

                   </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection