@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading"><h3 class="panel-title">List of all friends</h3></div>
                <div class="panel-body">
                    <ul class="list-group">
                        @forelse($friends as $key => $friend)
                            <li class="list-group-item">{{$friend->name}}</li>
                        @empty
                            <li class="list-group-item">You don't have any friend</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
