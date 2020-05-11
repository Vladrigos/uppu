@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Size</th>
                    <th scope="col">Comment</th>
                    <th scope="col">Download</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($paginator as $item)
                        <tr>
                            <th scope="row">{{ $item->id }}</th>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->size }}</td>
                            <td>{{ $item->comment }}</td>
                            <td>
                                <a href="{{ route('files.download', $item->id) }}" class="badge badge-dark">Download</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
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
        </div>
    </div>
@endsection
