@foreach(\App\Tweekracht\Html\Alert::types() as $type)
    @if(Session::has($type))
        <div class="row mb-2">
            <div class="col-md-12">
                <div class="alert alert-{{ $type }} alert-dismissible" role="alert">
                    <strong>{{ \App\Tweekracht\Html\Alert::getTitle($type) }}&excl;</strong> {{ Session::get($type) }}
                    <button data-dismiss="alert" class="close">&times;</button>
                </div>
            </div>
        </div>
    @endif
@endforeach
