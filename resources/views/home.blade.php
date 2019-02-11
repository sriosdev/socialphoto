@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('includes.message')

            @foreach ($images as $image)
                <div class="card img-post">
                    <div class="card-header">
                        @if ($image->user->image)
                            <div class="container-avatar">
                                <img src="{{ route('user.avatar', ['filename' => $image->user->image]) }}" class="avatar">
                            </div>
                        @endif

                        <div class="user-data">
                            {{ $image->user->nick }}
                        </div>
                    </div>

                    <div class="card-body">
                        <a href="{{ route('photo.detail', ['id' => $image->id]) }}">
                            <div class="img-container">
                                <img src="{{ route('photo.file', ['filename' => $image->image_path]) }}">
                            </div>
                        </a>

                        <div class="img-like">
                            <img src="{{ asset('img/heart.svg') }}">
                        </div>

                        <div class="img-comment">
                            <a href="" class="btn-comment">
                                <img src="{{ asset('img/comment.svg') }}" alt="">
                                {{ count($image->comments) }}
                            </a>
                        </div>

                        <span class="clearfix"></span>

                        <div class="img-description">
                            <span class="nickname">{{ $image->user->nick }} |</span>
                            {{ $image->description }} <br>
                            <span class="img-date">{{ \FormatTime::LongTimeFilter($image->created_at) }}</span>
                        </div>
                    </div>
                </div>
            @endforeach

            <!-- Pagination -->
            <div class="text-center">{{ $images->links() }}</div>
        </div>
    </div>
</div>
@endsection
