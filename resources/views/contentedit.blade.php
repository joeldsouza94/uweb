@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are about to edit content details.
                    <br>
                    To go back to all contents, click on below button.
                    <br><br>
                    <a href="{{ url('topics/'.$topic->id.'/contents') }}" class="btn btn-primary"><b>{{ $topic->topic }}</b>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit content details</div>
                    
                    <div class="panel-body">

                        <!-- Edit content Form -->
                        <form action="{{ url('topics/'.$content->topic_id.'/contents/'.$content->id) }}" method="POST" class="form-horizontal">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}

                            <!-- content Name -->
                            <div class="form-group">
                                <label for="content-name" class="col-sm-3 control-label">Content</label>

                                <div class="col-sm-6">
                                    <input disabled type="text" name="content" id="content-name" value="{{ $content->content }}" class="form-control" required>
                                </div>
                            </div>

                            <!-- content details -->
                            <div class="form-group">
                                <label for="content-name" class="col-sm-3 control-label">Details</label>

                                <div class="col-sm-6">
                                    <textarea style="overflow:auto;resize:vertical" name="details" id="content-details" class="form-control" required autofocus>{{ $content->details }}</textarea>
                                </div>
                            </div>

                            <!-- update content Button -->
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-6">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fa fa-plus"></i> Update content
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
