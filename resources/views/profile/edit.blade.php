@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8">
                <form action="{{ route('profile.update', $profile) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label class="" for="avatar">Chane Profile Picture: </label>
                        <input type="file" name="avatar" class="font-control-file">
                    </div>
                    <div class="form-group">
                        <label for="biography">Biography</label>
                        <textarea class="form-control" name="biography" id="biography" cols="20" rows="5">{{ $profile->biography ?? $profile->biography }}</textarea>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-6">
                                <button class="btn btn-block btn-primary" type="submit">
                                    Update Profile
                                </button>
                            </div>
                            <div class="col-6">
                                <button class="btn btn-block btn-secondary" type="reset">Reset</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-4">
                <div class="card">
                    <img src="{{ asset('storage/images/avatars/' . $profile->avatar) }}" alt="{{ $profile->user->name }}" class="card-img-top">
                    <div class="card-body">
                        <h4 class="card-title">Biography</h4>
                        <p class="card-text">
                            @if ($profile->biography)
                                {{ $profile->biography }}
                            @else
                                There is no bio...
                            @endif
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection