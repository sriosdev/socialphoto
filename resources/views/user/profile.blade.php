@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 col-xl-10">
            <div class="row align-items-center user-info">
                <div class="col-md-3">
                    @if ($user->image)
                        <div class="container-avatar">
                            <img src="{{ route('user.avatar', ['filename' => $user->image]) }}" class="avatar">
                        </div>
                    @else
                        <div class="container-avatar">
                            <img src="{{ asset('img/profile.svg') }}" class="avatar">
                        </div>
                    @endif
                </div>

                <div class="col-md-9">
                    <h2>{{ $user->name }} {{ $user->surname }}</h2>
                    <h4>{{ $user->nick }}</h4>
                    <p><span class="img-date">Joined: {{ \FormatTime::LongTimeFilter($user->created_at) }}</span></p>

                    <div class="row">
                            <div class="col-md-4">
                                <h5><i class="far fa-image"></i> {{ count($user->images) }} posts</h5>
                            </div>

                            <div class="col-md-4">
                                <h5><i class="far fa-heart"></i> {{ $likes }} likes</h5>
                            </div>

                            <div class="col-md-4">
                                <h5><i class="far fa-comment"></i> {{ $comments }} comments</h5>
                            </div>
                        </div>
                </div>
            </div>

            <hr class="mb-5">

            <div class="row">
                <div class="col-12">
                    @foreach ($images as $image)
                        @include('includes.post', ['image' => $image])
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
