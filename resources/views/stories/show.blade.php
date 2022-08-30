@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ $story->title }}
                    
                        <a href="{{ route('stories') }}" class="float-right btn btn-info btn-sm">Go Back</a>
                    </div>

                    <div class="card-body">
                        {{ $story->body }}

                        <p class="font-weight-bold">
                            Status:{{ $story->status == 1 ? 'Online' : 'Offline' }}
                        </p>
                        <p class="font-weight-bold">
                            Genre:{{ $story->genre }}

                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
