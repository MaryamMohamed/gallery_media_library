@extends('layouts.app')

@section('title', 'Albums')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$album->name }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('albums.upload', $album->id) }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('image') }}</label>

                            <div class="col-md-6">
                                <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}"  autocomplete="image" autofocus>

                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Upload') }}
                                </button>
                                <a href="{{ route('albums.index') }}" class="btn btn-danger"><i class="">Back</i></a>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            
                        </div>
                        
                    </form>

                    @foreach ($images as $image)
                    <img src="{{url( $image->getUrl())  }}" width="100" height="100" class="" alt="">
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection