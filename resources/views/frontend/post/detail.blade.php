@extends('frontend/layouts/index')
@section('content')
    <div class="main">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="index.html">{{ trans('en.title.home') }}</a></li>
                <li><a href="javascript:;">Blog</a></li>
                <li class="active">Blog Item</li>
            </ul>
            <!-- BEGIN SIDEBAR & CONTENT -->
            <div class="row margin-bottom-40">
                <!-- BEGIN CONTENT -->
                <div class="col-md-12 col-sm-12">
                    <div class="col-md-9">
                        @if(Auth::check() && $post->user->id == auth()->user()->id)
                            <div class="pull-right">
                                <li class="edit-in-detail">
                                    <a href="{{ route('posts.edit', $post->id) }}">
                                        <i class="nav-icon fa fa-pencil"></i>
                                        {{ trans('en.button.edit') }}
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
                                            <a href="javascript:;">
                                                <i class="fa fa-tags"></i>
                                                {{ $tag[0]['name'] }}
                                            </a>
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
                                    <h3>{{ trans('en.tag.leave_comment') }}</h3>
                                    <div class="form-group">
                                        <label>{{ trans('en.tag.message') }}</label>
                                        <textarea class="form-control" name="content_parent_comment" rows="8"></textarea>
                                    </div>
                                    <p>
                                        <button class="btn btn-primary parent-comment" data-url="{{ url('posts/'.$post->id.'/comments') }}">
                                            {{ trans('en.button.comment') }}
                                        </button>
                                    </p>
                                </div>
                                <h2>{{ trans('en.tag.comments') }}</h2>
                                <div class="comments">
                                    @if(Auth::check())
                                        {!! Form::hidden('username', auth()->user()->name) !!}
                                    @endif
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
                                                        <span>
                                                            {{ $comment->created_at }} /
                                                            <a class="reply-parent" id="{{ $comment->id }}">
                                                                {{ trans('en.button.reply') }}
                                                            </a>
                                                        </span>
                                                    </h4>
                                                    <p>{{ $comment->content }}</p>
                                                    <div class="input-group input-{{ $comment->id }}" style="display: none">
                                                        <input type="text" class="form-control content-reply" id="comment-{{ $comment->id }}"
                                                               name="content-reply">
                                                        <span class="input-group-btn">
                                                            <button class="btn btn-success reply-button" id="rep{{ $comment->id }}"
                                                                    data-url="{{ url('posts/'.$post->id.'/replies') }}">
                                                                {{ trans('en.button.reply') }}
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
                                <hr>
                                <h2 class="text-left">{{ trans('en.tag.comment_by_facebook') }}</h2>
                                <div class="comment">
                                    <div class="media">
                                        <div class="fb-comments" data-href="{{ Request::url() }}" data-width="100%" data-numposts="2">
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




