@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    Only the content creater can delete the content.
                    <br><br>
                    To go back to previous page, click on below button.
                    <br><br>
                    <a href="{{ URL::previous() }}" class="btn btn-primary"><b>Back</b>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
