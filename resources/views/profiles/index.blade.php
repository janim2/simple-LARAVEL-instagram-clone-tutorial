@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-15">
            <img src="{{ $user->profile->profileImage() }}" class="rounded-circle p-5 w-100">
        </div>
        <div class="col-9 p-5">
            <div class="d-flex justify-content-between align-items-baseline">

                <div class="d-flex">
                    <div class="h4 align-items-center">{{ $user->username }}</div>
                    <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>
                </div>

                @can('update', $user->profile)
                <a href="/p/create">Add New Post</a>
                @endcan
            </div>
            @can('update', $user->profile)
            <a href="/profile/{{ $user->id }}/edit">Edit Profile</a>
            @endcan
            <div class="d-flex">
                <div class="pe-5"><strong>{{ $postCount }}</strong> posts</div>
                <div class="pe-5"><strong>{{ $followersCount }}</strong> followers</div>
                <div class="pe-5"><strong>{{ $followingCount }}</strong> following</div>
            </div>
            <div class="pt-4 fw-bold">{{ $user->profile->title }}</div>
            <div>{{ $user->profile->description }}</div>
            <div><a href="#">{{ $user->profile->url ?? 'N/A'}}</a></div>
        </div>
    </div>
    <div class="row">
        @foreach($user->posts as $post)
        <div class="col-4 pb-4">
            <a href="/p/{{ $post-> id }}">
                <img class="w-100" src="/storage/{{ $post->image }}">
            </a>
        </div>
        @endforeach

    </div>
</div>
@endsection
