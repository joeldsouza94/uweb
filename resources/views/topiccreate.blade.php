@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are about add a new topic.
                    <br>
                    To go back to existing topics, click on below button.
                    <br><br>
                    <a href="{{ url('/') }}" class="btn btn-primary"><b>Topics</b>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create topic</div>
                    
                    <div class="panel-body">
                        <!-- Display Validation Errors -->
                        @include('common.errors')

                        <!-- Create topic Form -->
                        <form action="{{ url('topics') }}" method="POST" class="form-horizontal">
                            {{ csrf_field() }}

                            <!-- topic Name -->
                            <div class="form-group">
                                <label for="topic-name" class="col-sm-3 control-label">Topic</label>

                                <div class="col-sm-6">
                                    <input type="text" name="topic" id="topic-name" class="form-control" required autofocus value="{{ old('topic') }}">
                                </div>
                            </div>

                            <!-- topic Name -->
                            <div class="form-group">
                                <label for="topic-name" class="col-sm-3 control-label">Description</label>

                                <div class="col-sm-6">
                                    <textarea style="overflow:auto;resize:vertical" name="description" id="topic-description" class="form-control" required>{{ old('description') }}</textarea>
                                </div>
                            </div>

                            <!-- update topic Button -->
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-6">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fa fa-plus"></i> Add topic
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
