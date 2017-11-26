@if (count($errors) > 0)
    <!-- Form Error List -->
    <div class="alert alert-danger alert-dismissible alert-important" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Whoops! Something went wrong!</strong>

        <br><br>

        <ul style="list-style: none;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@else
    Everything seems fine so far!
@endif