@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8">
            <img src="/storage/{{ $post->image }}" class="w-100" alt="">
        </div>
        <div class="col-4">
            <div>
                <div class=" d-flex align-items-center">
                    <div style="padding-right: 10px;">
                        <img src="{{ $post->user->profile->profileImage() }}" class=" w-100 rounded-circle" style="max-width: 40px" alt="#">
                    </div>
                    <div>
                        <div style="font-weight: bold">
                            <a class=" text-decoration-none" href="/profile/{{ $post->user->id }}">
                                <span class=" text-dark">{{ $post->user->username }}</span>
                            </a>
                            <a href="#" class=" text-decoration-none" style=" padding-left: 6px;">. follow</a>
                        </div>
                    </div>
                </div>
                <hr> 
               <p>
                <span style="font-weight: bold">
                    <a class=" text-decoration-none" href="/profile/{{ $post->user->id }}">
                        <span class=" text-dark">{{ $post->user->username }}</span>
                    </a>
                </span>{{ $post->caption }}
                </p>
            </div>
        </div>
    </div>
</div>
@endsection