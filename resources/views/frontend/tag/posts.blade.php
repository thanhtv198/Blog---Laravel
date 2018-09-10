@extends('frontend/layouts/index')
@section('content')
    <div class="main">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="index.html">Home</a></li>
                <li><a href="javascript:;">Blog</a></li>
                <li class="active">Blog Page</li>
            </ul>
            <!-- BEGIN SIDEBAR & CONTENT -->
            <div class="row margin-bottom-40">
                <!-- BEGIN CONTENT -->
                <div class="col-md-12 col-sm-12">
                    <h1>Blog Page</h1>
                    <div class="content-page">
                        <div class="row">
                            <!-- BEGIN LEFT SIDEBAR -->
                            <div class="col-md-9 col-sm-9 blog-posts">
                                @foreach($posts as $row)
                                    <div class="row">
                                        <div class="col-md-4 col-sm-4">
                                            <img class="img-responsive" alt=""
                                                 src="{{ asset('source/frontend/theme/assets/frontend/pages/img/works/img2.jpg') }}">
                                        </div>
                                        <div class="col-md-8 col-sm-8">
                                            <h2><a href="{{ route('posts.show', $row->id) }}">{{ $row->title }}</a></h2>
                                            <ul class="blog-info">
                                                <li><i class="fa fa-calendar"></i>{{ $row->created_at }}</li>
                                                <li><i class="fa fa-eye"></i>{{ $row->view }}</li>
                                            </ul>
                                            <p>{{ $row->content }}</p>
                                            <a href="blog-item.html" class="more">Read more <i class="fa fa-angle-right"></i></a>
                                        </div>
                                    </div>
                                    <hr class="blog-post-sep">
                                @endforeach
                                <ul class="pagination">
{{--                                    {{ $->links() }}--}}
                                </ul>
                            </div>
                            <!-- RIGHT SIDEBAR -->
                            @include('frontend/layouts/sidebar')
                        </div>
                    </div>
                </div>
                <!-- END CONTENT -->
            </div>
        </div>
    </div>
@stop
