@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach($followed as $followe)
                <div class="col-4">
                    <div class="card">
                        <img class="card-img-top" src="{{ asset('storage/images/avatars/'.$followe->user_two->profile->avatar) }}" alt="">
                        <div class="card-header">
                            <h5 class="">{{ $followe->user_two->name }}</h5>
                        </div>
                        <div class="card-body">
                            @if ($followe->user_one->profile->biography)
                                <p class="card-text">{{ $followe->user_two->profile->biography }}</p>
                            @else
                                <p class="card-text">There is no biography</p>
                            @endif
                            <a class="btn btn-block btn-primary" href="{{ route('profile.show', $followe->user_two->profile) }}">Show Profile</a>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection