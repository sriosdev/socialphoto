@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-xl-6">
            @include('includes.message')

            @foreach ($images as $image)
                @include('includes.post', ['image' => $image])
            @endforeach

            <!-- Pagination -->
            <div class="text-center">{{ $images->links() }}</div>
        </div>
    </div>
</div>
@endsection
