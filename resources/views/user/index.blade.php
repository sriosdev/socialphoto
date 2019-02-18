@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-xl-6">
            @include('includes.message')

            <form action="{{ route('user.index') }}" method="get" id="finder">
                <div class="row">
                    <div class="form-group col-10">
                        <input type="text" class="form-control form-control-sm" name="search" id="search" placeholder="Search">
                    </div>

                    <div class="form-group col-2">
                        <button type="submit" class="btn btn-sm">Search</button>
                    </div>
                </div>

            </form>

            @foreach ($users as $user)
            <div class="row align-items-center people-list-card my-3">
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
                    <h3><a href="{{ route('user.profile', ['id' => $user->id]) }}">{{ $user->nick }}</a> </h3>
                    <h5>{{ $user->name }} {{ $user->surname }}</h5>
                    <p><span class="img-date">Joined: {{ \FormatTime::LongTimeFilter($user->created_at) }}</span></p>
                </div>
            </div>
            @endforeach

            <!-- Pagination -->
            <div class="text-center">{{ $users->links() }}</div>
        </div>
    </div>
</div>
@endsection
