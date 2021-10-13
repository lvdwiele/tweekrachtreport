@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="list-unstyled m-0 pl-2">
            @foreach ($errors->all() as $error)
                <li class="py-1">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
