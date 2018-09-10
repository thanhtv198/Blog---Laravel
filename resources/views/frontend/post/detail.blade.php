@extends('frontend/layouts/index')
@section('content')
    <div class="main">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="index.html">Home</a></li>
                <li><a href="javascript:;">Blog</a></li>
                <li class="active">Blog Item</li>
            </ul>
            <!-- BEGIN SIDEBAR & CONTENT -->
            <div class="row margin-bottom-40">
                <!-- BEGIN CONTENT -->
                <div class="col-md-12 col-sm-12">
                    <h1>Blog Item</h1>
                    <div class="content-page">
                        <div class="row">
                            <!-- BEGIN LEFT SIDEBAR -->
                            <div class="col-md-9 col-sm-9 blog-item">

                                <h2><p>{{ $post->title }}</p></h2>
                                <ul class="blog-info">
                                    <li><i class="fa fa-user"></i>By admin</li>
                                    <li><i class="fa fa-calendar"></i>{{ $post->created_at }}</li>
                                    <li><i class="fa fa-eye"></i>{{ $post->view }}</li>
                                    <li>
                                        @foreach($post->tags_name as $tag)
                                            <a href="javascript:;"><i class="fa fa-tags"></i> {{ $tag[0]['name'] }}</a>
                                        @endforeach
                                    </li>
                                </ul>
                                <div class="blog-item-img">
                                    @if(!is_null($post->image))
                                        <div>
                                            <img src="{{ url(config('blog.post.upload')) }}/{{ $post->image }}"
                                                 alt="{{ $post->name }}  " class="post-image">
                                        </div>
                                    @endif
                                </div>
                                <p>{{ $post->content }}</p>

                                <div class="post-comment padding-top-40">
                                    <h3>Leave a Comment</h3>
                                    {{--<form action="{{ url('posts/'.$post->id.'/comments') }}" method="post">--}}

                                    {{--@csrf--}}
                                    <div class="form-group">
                                        <label>Message</label>


                                        <textarea class="form-control" name="content" rows="8"></textarea>

                                    </div>
                                    <p>
                                        <button class="btn btn-primary parent-comment" data-url="{{ url('posts/'.$post->id.'/comments') }}">Post a
                                            Comment
                                        </button>
                                    </p>
                                    {{--</form>--}}

                                </div>

                                <div class="comment">
                                    <div class="media">
                                        <div class="container">
                                            <h2 class="text-center">Bootstrap 4 User Rating Form / Comment Form</h2>
                                            <div class="card">
                                                <div class="card-body-parent">
                                                    @foreach ($comments as $comment)
                                                        @if($comment->parent_id == null)
                                                            <div class="row parent-{{ $comment->id }}">
                                                                <div class="col-md-1">
                                                                    <img src="https://image.ibb.co/jw55Ex/def_face.jpg" class="img img-rounded"
                                                                         width="70px"/>
                                                                </div>
                                                                <div class="col-md-7">
                                                                    <p>
                                                                        <a class="float-left"
                                                                           href="https://maniruzzaman-akash.blogspot.com/p/contact.html"><strong>Maniruzzaman
                                                                                Akash</strong></a>
                                                                        {{ $comment->created_at }}
                                                                    </p>
                                                                    <div class="clearfix"></div>
                                                                    <p>{{ $comment->content }}</p>
                                                                    <a class="float-right btn btn-outline-primary ml-2 reply" id="{{ $comment->id }}">
                                                                        <i
                                                                                class="fa fa-reply"></i> Reply</a>
                                                                    <div class="input-{{ $comment->id }}" style="display: none">
                                                                        <input type="text" class="content-reply"  id="comment{{ $comment->id }}" size="50"
                                                                               name="content-reply">
                                                                        <button class="btn btn-success reply-button" id="rep{{ $comment->id }}"
                                                                                data-url="{{ url('posts/'.$post->id.'/replies') }}">Reply
                                                                        </button>
                                                                    </div>
                                                                </div>

                                                                @foreach ($comment->replies as $row)
                                                                    <div class="replies-{{ $comment->id }}">
                                                                        <div class="card card-inner" style="margin-left: 10rem">
                                                                            <div class="card-body">
                                                                                <div class="row">
                                                                                    <div class="col-md-1">
                                                                                        <img src="https://image.ibb.co/jw55Ex/def_face.jpg"
                                                                                             class="img img-rounded img-fluid" width="70px"/>
                                                                                    </div>
                                                                                    <div class="col-md-7">
                                                                                        <p>
                                                                                            <a class="float-left"
                                                                                               href="https://maniruzzaman-akash.blogspot.com/p/contact.html"><strong>Maniruzzaman
                                                                                                    Akash</strong></a>
                                                                                        </p>
                                                                                        <p>{{ $row->created_at }}</p>
                                                                                        <p>{{ $row->content }}</p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        @endif
                                                    @endforeach

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br><br>
                                <h2 class="text-left">Use Facebook Comment</h2>
                                <div class="comment">
                                    <div class="media">
                                        <div class="fb-comments" data-href="{{ Request::url() }}" data-numposts="5">

                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- END LEFT SIDEBAR -->

                            <!-- BEGIN RIGHT SIDEBAR -->
                        @include('frontend/layouts/sidebar')
                        <!-- END RIGHT SIDEBAR -->
                        </div>
                    </div>
                </div>
                <!-- END CONTENT -->
            </div>
            <!-- END SIDEBAR & CONTENT -->
        </div>
    </div>
@stop

<style>
    .heart-like {
        background: white !important;
    }
</style>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(
        function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(".parent-comment").click(function (e) {
                let content = $('textarea[name="content"]').val();
                let href = $(this).attr('data-url');
                // alert(content);

                $.ajax({
                    type: 'POST',
                    url: href,
                    data: {content: content},
                    dataType: "json",
                    success: function (data) {
                        let id = data.id;
                        let content = data.content;
                        console.log(content);
                        let created = data.created_at;
                        let url = 'http://localhost:8000/posts/' + id + '/replies';
                        let string = '<div class="row parent-' + id + '">\n' +
                            '                                                                <div class="col-md-1">\n' +
                            '                                                                    <img src="https://image.ibb.co/jw55Ex/def_face.jpg" class="img img-rounded"\n' +
                            '                                                                         width="70px"/>\n' +
                            '                                                                </div>\n' +
                            '                                                                <div class="col-md-7">\n' +
                            '                                                                    <p>\n' +
                            '                                                                        <a class="float-left"\n' +
                            '                                                                           href="https://maniruzzaman-akash.blogspot.com/p/contact.html"><strong>Maniruzzaman\n' +
                            '                                                                                Akash</strong></a>\n' +
                            +id + '\n' +
                            '                                                                    </p>\n' +
                            '                                                                    <div class="clearfix"></div>\n' +
                            +data.content + '\n' +
                            '                                                                    <a class="float-right btn btn-outline-primary ml-2 reply"  id="' + id + '"> <i\n' +
                            '                                                                                class="fa fa-reply"></i> Reply</a>\n' +
                            '                                                                    <div class="input-' + id + '" style="display: none;">\n' +
                            '                                                                        <input type="text" parent="' + id + '" class="content-reply" id="comment' +id + '" size="50" name="content-reply">\n' +
                            '                                                                        <button class="btn btn-success reply-button" id="rep' + id + '" data-url="' + url + '" >Reply</button>\n' +
                            '                                                                    </div>\n' +
                            '                                                                </div>\n' +
                            '                                                            </div>'

                        $('.card-body-parent').append(string);
                    }

                });
            });
        });

    $(document).ready(
        function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).on('click', '.reply', function (e) {
                let id = $(this).attr('id');
                $('.input-' + id).toggle();
            });

            $(document).on('click', ('.reply-button'), function (e) {
                let href = $(this).attr('data-url');
                let parent_id = $(this).attr('id').substring(3);
                let content = $('#comment' + parent_id).val();

                alert(parent_id);
                $.ajax({
                    type: 'POST',
                    url: href,
                    data: {repContent: content, parent_id: parent_id},
                    dataType: "json",
                    success: function (data) {
                        console.log(6);

                        let reply = '<div class="card card-inner" style="margin-left: 10rem">\n' +
                            '                                                                        <div class="card-body">\n' +
                            '                                                                            <div class="row">\n' +
                            '                                                                                <div class="col-md-1">\n' +
                            '                                                                                    <img src="https://image.ibb.co/jw55Ex/def_face.jpg"\n' +
                            '                                                                                         class="img img-rounded img-fluid" width="70px"/>\n' +
                            '                                                                                </div>\n' +
                            '                                                                                <div class="col-md-7">\n' +
                            '                                                                                    <p>\n' +
                            '                                                                                        <a class="float-left"\n' +
                            '                                                                                           href="https://maniruzzaman-akash.blogspot.com/p/contact.html"><strong>Maniruzzaman\n' +
                            '                                                                                                Akash</strong></a>\n' +
                            '                                                                                    </p>\n' +
                            '                                                                                     <p>' + data.content + '</p>\n' +
                            '                                                                                    <p>' + data.id + '</p>\n' +
                            '                                                                                </div>\n' +
                            '                                                                            </div>\n' +
                            '                                                                        </div>\n' +
                            '                                                                    </div>'


                        $('.replies-' + parent_id).append(reply);
                    }
                });
            });
        });

</script>
