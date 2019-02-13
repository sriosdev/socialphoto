<div class="card img-post">
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
        <a href="{{ route('photo.detail', ['id' => $image->id]) }}">
            <div class="img-container">
                <img src="{{ route('photo.file', ['filename' => $image->image_path]) }}">
            </div>
        </a>

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

                <span>{{ count($image->likes) }}</span>
            </div>
        </div>

        <div class="img-comment">
            <div class="btn-comment">
                <img src="{{ asset('img/comment.svg') }}">
                {{ count($image->comments) }}
            </div>
        </div>

        <span class="clearfix"></span>

        <div class="img-description">
            <span class="nickname">{{ $image->user->nick }} |</span>
            {{ $image->description }} <br>
            <span class="img-date">{{ \FormatTime::LongTimeFilter($image->created_at) }}</span>
        </div>
    </div>
</div>
