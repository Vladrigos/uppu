@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-10">
                <div class="card">
                    <div class="card-header">
                        {{ $file->name }}
                    </div>
                    <div class="card-body">
                        <div class="card col-6">
                            <div class="card-body">
                                <img src="{{asset('storage/'.$file->path)}}" alt="avatar"
                                     width="100%" height="100%">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @foreach($comments as $comment)
                <div class="col-8">
                    {{ $comment->user->username }}
                    {{ $comment->content }}
                </div>
            @endforeach
        </div>
    </div>
    </div>

@endsection
