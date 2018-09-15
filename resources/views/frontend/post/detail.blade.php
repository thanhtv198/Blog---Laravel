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
                    <div class="col-md-9">
                        {{--<div class="pull-left">--}}
                            {{--<h1>Blog Item</h1>--}}
                        {{--</div>--}}
                        @if($post->user->id == auth()->user()->id)
                        <div class="pull-right">
                            <li><a href="{{ route('posts.edit', $post->id) }}">
                                    <i class="nav-icon fa fa-edit"></i> Edit
                                </a>
                            </li>
                        </div>
                        @endif
                    </div>
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
                                <p>{!! $post->content !!}</p>

                                <div class="post-comment padding-top-40">
                                    <h3>Leave a Comment</h3>
                                    <div class="form-group">
                                        <label>Message</label>
                                        <textarea class="form-control" name="content_parent_comment" rows="8"></textarea>
                                    </div>
                                    <p>
                                        <button class="btn btn-primary parent-comment" data-url="{{ url('posts/'.$post->id.'/comments') }}">Post a
                                            Comment
                                        </button>
                                    </p>
                                </div>

                                <h2>Comments</h2>
                                <div class="comments">
                                    {!! Form::hidden('username', auth()->user()->name) !!}
                                    @foreach ($comments as $comment)
                                        @if($comment->parent_id == null)
                                            <div class="media comment-parent">
                                                <a href="javascript:;" class="pull-left">
                                                    <img src="" alt="" class="media-object">
                                                </a>
                                                <div class="media-body">
                                                    <h4 class="media-heading">
                                                        <strong>
                                                            {{ $comment->user->name }}
                                                        </strong>
                                                        <span>{{ $comment->created_at }} / <a class="reply-parent" id="{{ $comment->id }}">Reply</a></span>
                                                    </h4>
                                                    <p>{{ $comment->content }}</p>

                                                    <div class="input-group input-{{ $comment->id }}" style="display: none">
                                                        <input type="text" class="form-control content-reply" id="comment-{{ $comment->id }}" name="content-reply">
                                                        <span class="input-group-btn">
                                                            <button class="btn btn-success reply-button" id="rep{{ $comment->id }}" data-url="{{ url('posts/'.$post->id.'/replies') }}">
                                                                Reply
                                                            </button>
                                                        </span>
                                                    </div>
                                                    <div class="comment-replies-{{ $comment->id }}">
                                                        <!-- Nested media object -->
                                                        @foreach ($comment->replies as $row)
                                                            <div class="media">
                                                                <a href="javascript:;" class="pull-left">
                                                                    <img src="" alt="" class="media-object">
                                                                </a>
                                                                <div class="media-body">
                                                                    <h4 class="media-heading">
                                                                        <strong>{{ $row->user->name }}</strong>
                                                                        <span>{{ $row->created_at }}</span>
                                                                    </h4>
                                                                    <p>{{ $row->content }}</p>
                                                                </div>
                                                            </div>
                                                            <!--end media-->
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>

                                <br><br>
                                <h2 class="text-left">Use Facebook Comment</h2>
                                <div class="comment">
                                    <div class="media">
                                        <div class="fb-comments" data-href="https://www.facebook.com/thanhtv.198" data-width="100%" data-numposts="2">
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
    <script>
        CKEDITOR.replace('editor-post', {
            filebrowserBrowseUrl: '{{ asset('ckfinder/ckfinder.html') }}',
            filebrowserImageBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Images') }}',
            filebrowserFlashBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Flash') }}',
            filebrowserUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
            filebrowserImageUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
            filebrowserFlashUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
        });
    </script>
    <script>window.parent.CKEDITOR.tools.callFunction(1,'{$url}','')</script>
@stop

<style>
    #facebook .hidden_elem {
        display: block !important;
    }
</style>
@section('script')
    <script src="{{ asset('source/frontend/theme/assets/frontend/js/jquery-1.9.1.js') }}" type="text/javascript"></script>
@stop



