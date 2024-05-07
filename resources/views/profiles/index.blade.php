@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img src="{{ $user->profile->profileImage() }}" class="rounded-circle" style="height: 150px" alt="#">
        </div>
        <div class="col-9 pt-5">
            <div class=" d-flex justify-content-between align-items-baseline">
                <div class=" d-flex align-items-center pb-3">
                    <div class=" h4">{{ $user->username }}</div>
                    
                    <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>
                </div>
                @can('update', $user->profile)
                    <a href="/p/create"><button class="btn btn-primary">Add New Post</button></a>
                @endcan
                @can ('update', $user->profile)
                     <a href="/profile/{{ $user->id }}/edit"><button class="btn btn-primary">Edit Profile</button></a>
                @endcan
            </div>
            <div class="d-flex">
                <div style="padding-right: 40px"><strong>{{ $postCount }}</strong>posts</div>
                <div style="padding-right: 40px"><strong>{{ $followersCount }}</strong>followers</div>
                <div style="padding-right: 40px"><strong>{{ $followingCount }}</strong>following</div>
            </div>
            <div class=" pt-2" style="font-weight: bold;">{{ $user->profile->title }}</div>
            <div><p>{{ $user->profile->description }}</p></div>
            <div><a href="#" class=" text-decoration-none">{{ $user->profile->url }}</a></div>
        </div>
    </div>
    <div class="row p-5">
        @foreach ($user->posts as $post)
         <div class="col-4 pb-4">
            <a href="/p/{{ $post->id }}"><img src="/storage/{{ $post->image }}" class=" w-100 " alt="#"></a>
        </div>   
        @endforeach
    </div>
    
@endsection
