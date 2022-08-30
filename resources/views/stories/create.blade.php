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

                            <div class="form-group">
                                <label for="title">Title</label>    
                                <input type="text" name="title" id="title" class="form-control">
                            </div>
                            
                            <div class="form-group">
                                <label for="body">Body</label>    
                                <textarea name="body" class="form-control" id="body" cols="30" rows="10"></textarea>
                                
                            </div>

                            <div class="form-group">
                                <select name="genre" class="form-control">
                                    <option value="">--Select Genre--</option>
                                    <option value="horror">Horror</option>
                                    <option value="love">Love</option>
                                    <option value="comedy">Comedy</option>
                                </select>
                            </div>

                            <div class="form-group row">
                                <legend><h6>Status</h6></legend>

                                <div class="form-check mr-2">
                                    <input type="radio" name="status" checked class="form-check-input" value="1">
                                    <label for="online" class="form-check-label">Online</label>
                                </div>
                                
                                <div class="form-check">
                                    <input type="radio" name="status" class="form-check-input" value="0">
                                    <label for="offline" class="form-check-label">Offline</label>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-success mt-10">Add Story</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
