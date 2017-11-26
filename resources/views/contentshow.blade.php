@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

                <table class="table table-striped content-table">

                    <!-- Table heAD -->
                    <thead>
                        <!-- content link -->
                        <th class="table-text">
                            <p style="font-weight: 900;font-size: 200%;">{{ $content->content }}</p>
                        </th>

                        <!-- edit Button -->
                        <th>
                            <!-- edit Button -->
                            <a href="{{ url('topics/'.$topic->id.'/contents/'.$content->id.'/edit') }}" class="btn btn-warning">Edit
                            </a>
                        </th>

                        <!-- Delete Button -->
                        <th>
                            <form action="{{ url('topics/'.$topic->id.'/contents/'.$content->id) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}

                                <button type="submit" id="delete-content-{{ $content->id }}" class="btn btn-danger">
                                    <i class="fa fa-btn fa-trash"></i>Delete
                                </button>
                            </form>
                        </th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $content->details }}</td>
                        </tr>
                    </tbody>
                </table>

                <div class="panel-body">
                    <p style="font-size: 80%;" class="text-right">-Added by {{ $added_by->name }}<br>
                        -Last updated by {{ $updated_by->name }}
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">View all contents under {{ $topic->topic }}</div>

                <div class="panel-body">
                    <a href="{{ url('topics/'.$topic->id.'/contents') }}" class="btn btn-primary"><b>{{ $topic->topic }}</b>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
