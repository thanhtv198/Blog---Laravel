@extends('admin/layouts/index')
@section('content')
<!-- <example></example> -->
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Members Information</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Data Tables</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Table With Full Features</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>{{ trans('en.form.name') }}</th>
                                <th>{{ trans('en.form.email') }}</th>
                                <th>{{ trans('en.form.birthday') }}</th>
                                <th>{{ trans('en.form.password') }}</th>
                                <th>{{ trans('en.form.status') }}</th>
                                <th>{{ trans('en.form.action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name}}</td>
                                <td>{{ $user->email }}</td>
                                <td></td>
                                <td>{{ $user->birthday }}</td>
                                <td>
                                    @if ($user->status == 1)
                                    <span class="right badge badge-success active-{{ $user->id }}">Activating</span>
                                    <br>
                                    <hr>
                                    <i class="block-{{ $user->id }}" id="status-block-now">
                                                <p class="show_input block-font" id="block-{{ $user->id }}">
                                                    <span class="right badge badge-danger">Block Now</span>
                                                </p>
                                            </i>
                                    <div id="show{{ $user->id }}" class="hidd" style="display: none; ">
                                        {!! Form::text('reason', null, ['id' => "rea$user->id"]) !!} {!! Form::hidden('url', config('blog.base_url'), ['id'
                                        => 'url']) !!}
                                        <span href="javascript:void(0)" data-url="{{ route('admin.users.inactive', $user->id) }}" class="block-font send" id="re{{ $user->id }}">
                                            <i class="fa fa-paper-plane" aria-hidden="true"></i>
                                            </span>
                                    </div>
                                    @else
                                    <p class="show_input block-font" id="reason{{ $user->id }}">
                                        <span class="right badge badge-danger">blocked</span><br>
                                        <span id="reason">{{ $user->block_reason }}</span>
                                        <hr>
                                    </p>

                                    <br>
                                    <p>
                                        <span class="right badge badge-success block-font active-now" id="active-now-{{ $user->id }}" data-url="{{ route('admin.users.active', $user->id) }}">Active Now</span>
                                    </p>

                                    @endif
                                    <div id="text-show{{ $user->id }}" class="text-reason">
                                    </div>
                                </td>
                                <td>
                                    <a href="{{ route('admin.users.show', $user->id) }}">
                                            <i class="fa fa-edit" aria-hidden="true" id="eye"></i>
                                        </a>|
                                    <a href="{{ route('admin.users.edit', $user->id) }}">
                                            <i id="trash" class="fa fa-trash" aria-hidden="true">

                                            </i>
                                        </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
@endsection
<style>
     .block-font {
        font-size: 15px;
        cursor: pointer
    }

    .text-reason {
        width: 120px;
    }
</style>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
    //block user
    $(document).ready(
        function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $(".show_input").click(function (e) {
                //get from charecter 6 -> id
                var id = $(this).attr('id').substring(6);
                $('.hidd').hide();
                $("#show" + id).show("slow");
            });
            //send
            $(".send").click(function (e){
                var id = $(this).attr('id').substring(2);
                var href = ($(this).attr('data-url'));
                var reason = $('#rea' + id).val();

                $.ajax({
                    type: 'post',
                    url: href,
                    data: {reason: reason},
                    dataType: 'json',
                    success: function (data) {
                        alert(data);
                    }
                });

                $("#text-show" + id).html(reason);
                $("#text-show" + id).before(' <span class="right badge badge-danger block-font">blocked</span> ');
                $('.hidd').hide();
                $('.active-' + id).hide();
                $('.block-' + id).hide();
            });

        });

    //active now
    $(document).ready(
        function () {
            $(".active-now").click(function (e) {
                var id = $(this).attr('id').substring(11);
                var href = ($(this).attr('data-url'));
               
                $.ajax({
                    type: 'post',
                    url: href,
                    success: function () {
                    }
                });

                $("#text-show" + id).append(' <span class="right badge badge-success block-font">Activing</span>');
                $('#active-now-' + id).hide();
                $('.reason-' + id).hide();
                $('#block-' + id).hide();
            });
        });
</script>