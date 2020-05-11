@extends('layouts.app')

@section('content')

    @if(!$errors)
        <h1>error</h1>
    @endif
    <div class="container">
        <div class="row justify-content-center">
            <form action="{{ route('files.store') }}" method="post" enctype="multipart/form-data">
            @csrf
                <div class="form-group">
                    <input type="file" name="file" required>
                </div>
                <textarea name="comment"
                          id="comment"
                          class="form-control"
                          rows="3">
                </textarea>
                <button class="btn btn-default" type="submit">Ок</button>
            </form>
        </div>
    </div>

@endsection
