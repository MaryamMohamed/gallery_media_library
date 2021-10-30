@extends('layouts.app')

@section('title', 'Albums')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('My Blogs') }}</div>

                <div class="card-body">
                    <a href="{{ route('albums.create') }}" class="btn btn-sm btn-success"><i class="fa fa-edit">Add New Alboum</i></a>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Album Name</th>
                                <th>Album Description</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($albums as $album)
                                
                            <tr>
                                <td>{{$loop->index + 1}}</td>
                                <td>{{ $album->name }}</td>
                                <td>{{ $album->description }}</td>
                                <td>
                                    <a href="{{ route('albums.show', $album->id) }}" class="btn btn-sm btn-success"><i class="fa fa-edit">view</i></a>
                                    <a href="{{ route('albums.edit', $album->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit">Edit</i></a>
                                    <form method="POST" action="{{ route('albums.destroy', $album->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                        
                        
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection