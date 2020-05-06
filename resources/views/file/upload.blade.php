@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <form action="" method="post" enctype="multipart/form-data">
            @csrf
                <div class="form-group">
                    <input type="file" name="file">
                </div>

                <button class="btn btn-default" type="submit"></button>
            </form>
        </div>
    </div>

@endsection
