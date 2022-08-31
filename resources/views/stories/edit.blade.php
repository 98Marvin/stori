@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Edit Story

                        <a href="{{ route('stories') }}" class="float-right btn btn-info btn-sm">Go Back</a>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('stories.update', [$story]) }}" method="post">
                            @csrf
                            @method('put')

                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" id="title"
                                    value="{{ old('title', $story->title) }}"
                                    class="form-control
                                        @error('title')
                                            is-invalid 
                                        @enderror
                                ">

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <em><b>{{ $message }}</b></em>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="body">Body</label>
                                <textarea name="body" class="form-control @error('body') is-invalid @enderror">
                                    {{ old('body', $story->body) }}
                                </textarea>

                                @error('body')
                                    <span class="invalid-feedback" role="alert">
                                        <em><b>{{ $message }}</b></em>
                                    </span>
                                @enderror

                            </div>

                            <div class="form-group">
                                <select name="genre" class="form-control @error('genre') is-invalid @enderror">
                                    <option value="">--Select Genre--</option>
                                    <option value="horror" {{ 'horror' == old('genre', $story->genre) ? 'selected' : '' }}>
                                        Horror</option>
                                    <option value="love" {{ 'love' == old('genre', $story->genre) ? 'selected' : '' }}>
                                        Love</option>
                                    <option value="comedy" {{ 'comedy' == old('genre', $story->genre) ? 'selected' : '' }}>
                                        Comedy</option>
                                </select>
                                @error('genre')
                                    <span class="invalid-feedback" role="alert">
                                        <em><b>{{ $message }}</b></em>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group row">
                                <legend>
                                    <h6>Status</h6>
                                </legend>

                                <div class="form-check @error('status') is-invalid @enderror mr-2">
                                    <input type="radio" name="status" class="form-check-input" value="1"
                                        {{ '1' == old('status', $story->status) ? 'checked' : '' }}>
                                    <label for="online" class="form-check-label">Online</label>

                                </div>

                                <div class="form-check">
                                    <input type="radio" name="status" class="form-check-input" value="0"
                                        {{ '0' == old('status', $story->status) ? 'checked' : '' }}>
                                    <label for="offline" class="form-check-label">Offline</label>
                                </div>
                                @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <em><b>{{ $message }}</b></em>
                                    </span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-success mt-10">Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
