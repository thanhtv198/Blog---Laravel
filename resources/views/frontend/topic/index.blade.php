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
                <h1>{{ $topicName }}</h1>
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
                                        <h2><a href="{{ route('posts.show', $row->slug) }}">{{ $row->title }}</a></h2>
                                        <ul class="blog-info">
                                            <li><i class="fa fa-calendar"></i>{{ $row->created_at }}</li>
                                            <li><i class="fa fa-eye"></i>{{ $row->view }}</li>
                                        </ul>
                                        <div view="home-post">
                                            <p class="content-post">{!! $row->content !!}</p>
                                        </div>
                                    </div>
                                </div>
                                <hr class="blog-post-sep">
                            @endforeach
                            <ul class="pagination">
                                {{--{{ $posts->links() }}--}}
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
<style>
    .morecontent span {
        display: none;
    }

    .morelink {
        display: block;
        color: #2784e1!important;
    }
    [view=home-post] img{
        display:none;
    }


</style>
@section('script')
    <script src="{{ asset('source/frontend/theme/assets/frontend/js/jquery-1.9.1.js') }}" type="text/javascript"></script>
@stop

