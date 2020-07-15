@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @foreach($paginator as $file)
                @php
                    /** @var \App\Models\File $file */
                @endphp
                <div class="col-md-4">
                    <div class="card mr-3 mb-5" style="height: 300px">
                        <div class="card-header" style="height: 50px">
                            <img src="{{ $file->user->getAvatarAttribute($file->user->avatar) }}" alt="avatar"
                                 width="30px" height="30px">
                            <div class="ml-2 d-inline">
                                <a href="{{route('profiles.show', $file->user->username)}}">{{$file->user->username}}</a>
                            </div>
                        </div>
                        <div class="card-img-top text-center mt-2">
                            <img class="" src="{{asset('storage/'.$file->path)}}" height="120px"
                                 width="120px" alt="img">
                        </div>

                        <div class="card-body">
                            <div class="card-title">
                                <div class="card-text">Size: {{$file->getHumanSize()}}</div>
                                <div class="card-text">Uploaded: {{$file->created_at}}</div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <a href="{{route('files.download', $file->id)}}">{{$file->name}}</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        @if($paginator->total() > $paginator->count())
            <br>
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            {{ $paginator->links() }}
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
