@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header">Edit description</div>
                <div class="card-body">
                    <form action="{{ route('photo.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="image_id" value="{{ $image->id }}">

                        <div class="row">
                            <div class="img-container col-12">
                                <img src="{{ route('photo.file', ['filename' => $image->image_path]) }}">
                            </div>
                        </div>

                        <hr>

                        <div class="form-group row">
                            <div class="col-12">
                                <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : ''}}" name="description" id="description" required>{{ $image->description }}
                                </textarea>

                                @if ($errors->has('description'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <input type="submit" class="btn btn-primary" name="input" value="Update">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
