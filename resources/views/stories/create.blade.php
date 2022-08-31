@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Create New Story

                        <a href="{{ route('stories') }}" class="float-right btn btn-info btn-sm">Go Back</a>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('stories.store') }}" method="post">
                            @csrf

                            @include('stories.form')

                            <button type="submit" class="btn btn-success mt-10">Add Story</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
