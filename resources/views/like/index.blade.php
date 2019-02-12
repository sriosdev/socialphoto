@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            @include('includes.message')

            <h3 class="mb-4">Posts you've liked</h3>

            @foreach ($likes as $like)
                @include('includes.post', ['image' => $like->image])
            @endforeach

            <!-- Pagination -->
            <div class="clearfix"></div>
            {{ $likes->links() }}
        </div>
    </div>
</div>
@endsection

