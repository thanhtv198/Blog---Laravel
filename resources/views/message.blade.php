@if($errors->count()>0)
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger alert-dismissable">
            <a class="panel-close close" data-dismiss="alert">×</a>
            {{ $error }}
        </div>
    @endforeach
@endif
@if (Session::has('message'))
    <div class="alert alert-danger alert-dismissable">
        <a class="panel-close close" data-dismiss="alert">×</a>
        {{Session::get('message')}}
    </div>
@endif
@if (Session::has('success'))
    <div class="alert alert-info alert-dismissable">
        <a class="panel-close close" data-dismiss="alert">×</a>
        {{Session::get('success')}}
    </div>
@endif

