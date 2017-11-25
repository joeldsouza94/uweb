@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    Welcome!
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                    
                    <div class="panel-body">
                        <!-- Display Validation Errors -->
                        @include('common.errors')

                        <!-- Edit topic Form -->
                        <form action="{{ url('topics/'.$topic->id) }}" method="POST" class="form-horizontal">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}

                            <!-- topic Name -->
                            <div class="form-group">
                                <label for="topic-name" class="col-sm-3 control-label">Topic</label>

                                <div class="col-sm-6">
                                    <input type="text" name="topic" id="topic-name" value="{{ $topic->topic }}" class="form-control" required>
                                </div>
                            </div>

                            <!-- topic Name -->
                            <div class="form-group">
                                <label for="topic-name" class="col-sm-3 control-label">Description</label>

                                <div class="col-sm-6">
                                    <textarea style="overflow:auto;resize:vertical" name="description" id="topic-description" class="form-control" required autofocus>{{ $topic->description }}</textarea>
                                </div>
                            </div>

                            <!-- update topic Button -->
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-6">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fa fa-plus"></i> Update topic
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
