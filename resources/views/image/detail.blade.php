@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 col-xl-10 ">
            @include('includes.message')

            <div class="row">
                <div class="col-md-7 col-xl-8">
                    <div class="card img-detail">
                        <div class="card-body img-detail-photo">
                            <div class="img-container">
                                <img src="{{ route('photo.file', ['filename' => $image->image_path]) }}">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-5 col-xl-4">
                    <div class="card img-detail">
                        <a href="{{ route('user.profile', ['id' => $image->user->id]) }}" class="card-link">
                            <div class="card-header">
                                @if ($image->user->image)
                                    <div class="container-avatar">
                                        <img src="{{ route('user.avatar', ['filename' => $image->user->image]) }}" class="avatar">
                                    </div>
                                @else
                                    <div class="container-avatar">
                                        <img src="{{ asset('img/profile.svg') }}" class="avatar">
                                    </div>
                                @endif

                                <div class="user-data">
                                    {{ $image->user->nick }}
                                </div>
                            </div>
                        </a>

                        <div class="card-body">
                            <span class="clearfix"></span>

                            <div class="img-description">
                                {{ $image->description }} <br>
                                <span class="img-date">
                                    {{ \FormatTime::LongTimeFilter($image->created_at) }}
                                </span>
                                @if (Auth::user() && Auth::user()->id == $image->user_id)
                                    <span class="btn-actions">
                                        <a href="{{ route ('photo.edit', ['id' => $image->id]) }}" class="post-edit"><i class="fas fa-pencil-alt"></i></a>
                                        &nbsp;&nbsp;
                                        <a href="" class="post-delete" data-toggle="modal" data-target="#modalDelete"><i class="fas fa-trash-alt"></i></a>
                                    </span>

                                    <!-- Delete Modal -->
                                    <div class="modal" id="modalDelete">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Are you sure?</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>

                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                    If you delete this post, your photo will no longer be available
                                                </div>

                                                <!-- Modal footer -->
                                                <div class="modal-footer">
                                                    <button type="button" class="btn" data-dismiss="modal">Cancel</button>
                                                    <a href="{{ route('photo.delete', ['id' => $image->id]) }}" class="post-delete">
                                                        <button type="button" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</button>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>

                            <hr>

                            <div class="img-like">
                                <?php $user_like = false; ?>
                                @foreach ($image->likes as $like)
                                    @if ($like->user->id == Auth::user()->id)
                                        <?php $user_like = true; ?>
                                    @endif
                                @endforeach

                                <div class="btn-like">
                                    @if ($user_like)
                                <img src="{{ asset('img/heart-color.svg') }}" data-id="{{ $image->id }}" class="like">
                                    @else
                                        <img src="{{ asset('img/heart.svg') }}" data-id="{{ $image->id }}" class="dislike">
                                    @endif

                                    {{ count($image->likes) }}
                                </div>
                            </div>

                            <div class="img-comment">
                                <a href="" class="btn-comment">
                                    <img src="{{ asset('img/comment.svg') }}" alt="">
                                    {{ count($image->comments) }}
                                </a>
                            </div>


                            <span class="clearfix"></span>

                            @foreach ($image->comments as $comment)
                                <div class="comment">
                                    <span class="nickname">{{ $comment->user->nick }} |</span>
                                    {{ $comment->content }}
                                    <br>
                                    <span class="img-date">{{ \FormatTime::LongTimeFilter($comment->created_at) }}</span>

                                    @if (Auth::check() && ($comment->user_id == Auth::user()->id || $comment->image->user_id == Auth::user()->id))
                                        &middot;
                                        <a href="{{ route('comment.delete', ['id' => $comment->id]) }}" class="x-delete">Delete</a>
                                    @endif
                                </div>
                            @endforeach

                            <hr>

                            <form action="{{ route('comment.save') }}" method="POST">
                                @csrf

                                <input type="hidden" name="image_id" value="{{ $image->id }}">
                                <p>
                                    <textarea class="form-control {{ $errors->has('content') ? 'is-invalid' : ''}}" name="content" required></textarea>

                                    @if ($errors->has('content'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('content') }}</strong>
                                        </span>
                                    @endif
                                </p>
                                <button type="submit" class="btn btn-sm btn-primary">Post</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
