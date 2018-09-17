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
                <div class="col-md-12 col-sm-12"><br>
                    <div class="container">
                        <h2>View your timeline and questions</h2>
                        <br>
                    </div>
                    <div id="exTab2" class="container">
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a  href="#1" data-toggle="tab">Timeline</a>
                            </li>
                            <li><a href="#2" data-toggle="tab">Questions</a>
                            </li>
                            <li><a href="#3" data-toggle="tab">Respond</a>
                            </li>
                        </ul>
                        <div class="tab-content ">
                            <div class="tab-pane active" id="1">
                                <div class="col-md-8 col-sm-8">
                                    @foreach($posts as $row)
                                    <h2><a href="{{ route('posts.show', $row->id) }}">{{ $row->title }}</a></h2>
                                    <ul class="blog-info">
                                        <li><i class="fa fa-calendar"></i>{{ $row->created_at }}</li>
                                        <li><i class="fa fa-eye"></i>{{ $row->view }}</li>
                                    </ul>
                                    <p  class="content-post">{!! $row->content !!}</p>
                                    @endforeach
                                </div>
                            </div>
                            <div class="tab-pane" id="2">
                                <div class="col-md-8 col-sm-8">
                                    @foreach($questions as $row)
                                        <h2><a href="{{ route('posts.show', $row->id) }}">{{ $row->title }}</a></h2>
                                        <ul class="blog-info">
                                            <li><i class="fa fa-calendar"></i>{{ $row->created_at }}</li>
                                            <li><i class="fa fa-eye"></i>{{ $row->view }}</li>
                                        </ul>
                                        <p  class="content-post">{{ $row->content }}</p>
                                    @endforeach
                                </div>
                            </div>
                            <div class="tab-pane" id="3">
                                <h3>add clearfix to tab-content (see the css)</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <!-- END CONTENT -->
            </div>
            <!-- END SIDEBAR & CONTENT -->
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

</style>

@section('script')
    <script src="{{ asset('source/frontend/theme/assets/frontend/js/jquery-1.9.1.js') }}" type="text/javascript"></script>
@stop



