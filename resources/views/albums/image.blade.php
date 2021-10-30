@extends('layouts.app')

@section('title', 'Albums')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{$album->name }}</div>

                <div class="card-body">
                    <img src="{{url( $anImage->getUrl())  }}" >
                    <ul>
                        <li>Name: {{$anImage->name  }}</li>
                        <li>Type: {{$anImage->mime_type  }}</li>
                        <li>Size: {{$anImage->human_readable_size  }}</li>
                    </ul>
                    <a href="{{ route('albums.show', $album->id) }}" class="btn btn-danger"><i class="">Back</i></a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection