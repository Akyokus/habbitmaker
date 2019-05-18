@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-5">
                        <div class="row">
                            <div class="col-4">
                                <div class="avatar">
                                    <img src="{{ asset('storage/images/avatars/' . $profile->avatar) }}"
                                         alt="{{ $profile->user->name }}">
                                </div>

                            </div>
                            <div class="offset-1 col-6">
                                <h3 class="profile-title">{{ $profile->user->name }}</h3>
                                <div class="add-follow">
                                    @if($profile->user->id != auth()->id())
                                        @if(isset($follow->status))
                                            @if($follow->status == config('friend.status.is_not_friend'))
                                                <a class="btn btn-primary btn-block" href="{{ route('add_follow', $profile) }}" onclick="event.preventDefault();document.getElementById('add-follow').submit();">Follow</a>
                                                <form id="add-follow" action="{{ route('add_follow', $profile) }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                                            @else
                                                <a class="btn btn-primary btn-block" href="{{ route('unfollow', $profile) }}" onclick="event.preventDefault();document.getElementById('unfollow').submit();">Unfollow</a>
                                                <form action="{{ route('unfollow', $profile) }}" method="POST" id="unfollow" style="display: none;">
                                                    @csrf
                                                </form>
                                            @endif
                                        @else
                                            <a class="btn btn-primary btn-block" href="{{ route('add_follow', $profile) }}" onclick="event.preventDefault();document.getElementById('add-follow').submit();">Follow</a>
                                            <form id="add-follow" action="{{ route('add_follow', $profile) }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        @endif
                                    @else
                                        <a class="btn btn-block btn-primary" href="{{ route('profile.edit', $profile) }}">Edit</a>
                                    @endif
                                </div>
                                <div class="connections pt-2">
                                    <div class="row">
                                        <div class="col-6">
                                            <h5>Followed</h5>
                                            <a class="btn btn-block btn-success" href="{{ route('followed', $profile->id) }}">{{ $profile->followed->count() }}</a>
                                        </div>
                                        <div class="col-6">
                                            <h5>Followers</h5>
                                            <a class="btn btn-block btn-danger" href="{{ route('followers', $profile->id) }}">{{ $profile->followers->count() }}</a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-7">
                        <div class="card">
                            <div class="card-header">
                                <h2>Biography</h2>
                            </div>
                            <div class="card-body">
                                @if(!empty($profile->biography))
                                    {{ $profile->biography }}
                                @else
                                    There is no biography...
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection