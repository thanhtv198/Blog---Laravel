@extends('admin/layouts/index')
@section('content')
    <!-- <example></example> -->
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Tables</h1>
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
                                <th>{{ trans('en.form.title') }}</th>
                                <th>{{ trans('en.form.view') }}</th>
                                <th>{{ trans('en.form.content') }}</th>
                                <th>{{ trans('en.form.status') }}</th>
                                <th>{{ trans('en.form.action') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($posts as $post)
                                <tr id="row-{{ $post->id }}">
                                    <td>{{ $post->user->name}}</td>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->view }}</td>
                                    <td>
                                    <span class="more">
                                        {!! $post->content !!}
                                        </span>
                                    </td>
                                    <td>
                                        @if ($post->status == 1)
                                            <span class="right badge badge-success active-{{ $post->id }}">Activating</span>
                                            <br>
                                            <hr>
                                            <i class="reject-{{ $post->id }}" id="status-reject-now">
                                                <p class="show_input reject-font" id="reason{{ $post->id }}">
                                                    <span class="right badge badge-danger">Reject Now</span>
                                                </p>
                                            </i>
                                            <div id="show{{ $post->id }}" class="hidd" style="display: none; ">
                                                {!! Form::text('reason', null, ['id' => "rea$post->id"]) !!} {!! Form::hidden('url', config('blog.base_url'), ['id'
                                        => 'url']) !!}
                                                <span href="javascript:void(0)" data-url="{{ route('admin.posts.inactive', $post->id) }}"
                                                      class="reject-font send" id="re{{ $post->id }}">
                                            <i class="fa fa-paper-plane" aria-hidden="true"></i>
                                            </span>
                                            </div>
                                        @else
                                            <p class="show_input reject-font" id="reject-{{ $post->id }}">
                                                <span class="right badge badge-danger">Rejected</span><br>
                                                <span id="reason">{{ $post->reject_reason }}</span>
                                            <hr>
                                            </p>
                                            <br>
                                            <p>
                                                <span class="right badge badge-success reject-font active-now" id="active-now-{{ $post->id }}"
                                                      data-url="{{ route('admin.posts.active', $post->id) }}">Active Now</span>
                                            </p>
                                        @endif
                                        <div id="text-show{{ $post->id }}" class="text-reason">
                                        </div>
                                    </td>
                                    <td>
                                        <p class="del-post" id="{{ $post->id }}" data-url="{{ route('admin.posts.destroy', $post->id) }}">
                                            <button type="button" class="btn btn-block btn-outline-danger btn-sm">Delete</button>
                                        </p>
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
    .morecontent span {
        display: none;
    }

    .morelink {
        display: block;
        color: blue!important;
    }

    .reject-font {
        font-size: 15px;
        cursor: pointer
    }

    .text-reason {
        width: 120px;
    }
</style>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
    //show more post
    $(document).ready(
        function () {
            let showChar = 200;
            var ellipsestext = "...";
            var moretext = "Show more";
            var lesstext = "Show less";

            $('.more').each(function () {
                var content = $(this).html();
                if (content.length > showChar) {
                    var c = content.substr(0, showChar);
                    var h = content.substr(showChar, content.length - showChar);
                    var html = c +
                        '<span class="moreellipses">'
                        + ellipsestext +
                        '&nbsp;</span><span class="morecontent"><span>'
                        + h +
                        '</span>&nbsp;&nbsp;<a href="" class="morelink">'
                        + moretext +
                        '</a></span>';

                    $(this).html(html);
                }

            });

            $(".morelink").click(function () {
                if ($(this).hasClass("less")) {
                    $(this).removeClass("less");
                    $(this).html(moretext);
                } else {
                    $(this).addClass("less");
                    $(this).html(lesstext);
                }

                $(this).parent().prev().toggle();
                $(this).prev().toggle();
                return false;
            });
        });

    //reject post
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
            $(".send").click(function (e) {
                var id = $(this).attr('id').substring(2);
                var href = ($(this).attr('data-url'));
                var reason = $('#rea' + id).val();

                $.ajax({
                    type: 'POST',
                    url: href,
                    data: {reason: reason, id: id},
                    dataType: 'json',
                    success: function (data) {
                        console.log(data);
                    }
                });

                $("#text-show" + id).html(reason);
                $("#text-show" + id).before(' <span class="right badge badge-danger reject-font">Rejected</span> ');
                $('.hidd').hide();
                $('.active-' + id).hide();
                $('.reject-' + id).hide();
            });

        });


    //active now
    $(document).ready(
        function () {
            $(".active-now").click(function (e) {
                var id = $(this).attr('id').substring(11);
                var href = ($(this).attr('data-url'));
                console.log(href);
                $.ajax({
                    type: 'POST',
                    url: href,
                    success: function () {
                    }
                });

                $("#text-show" + id).append(' <span class="right badge badge-success reject-font">Activing</span>');
                $('#active-now-' + id).hide();
                $('.reason-' + id).hide();
                $('#reject-' + id).hide();
            });
        });

    //delete user
    $(document).ready(
        function () {
            $(document).on('click', '.del-post', function (e) {
                if(confirm('Delete !')){
                    let id = $(this).attr('id');
                    $('#row-' + id).remove();
                    let url = $(this).attr('data-url');
                    // alert(url);
                    $.ajax({
                        url: url,
                        type: 'DELETE',  // user.destroy
                        success: function (result) {

                            // confirm('Delete Success!')
                        }
                    });
                }
            })
        });
</script>