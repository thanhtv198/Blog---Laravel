@extends('admin/layouts/index')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ trans('en.title.member_profile') }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{ trans('en.title.home') }}</a></li>
                        <li class="breadcrumb-item active">{{ trans('en.title.member_profile') }}</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img src="{{ asset('source/admin/dist/img/user4-128x128.jpg') }}" class="img-circle elevation-2" alt="User Image">
                            </div>
                            <h3 class="profile-username text-center">{{ $user->name }}</h3>
                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>{{ trans('en.tag.member_reputation') }}</b> <a class="float-right"></a>
                                </li>
                                <li class="list-group-item">
                                    <b>{{ trans('en.tag.member_total_post') }}</b> <a class="float-right"></a>
                                </li>
                                <li class="list-group-item">
                                    <b>{{ trans('en.tag.member_total_question') }}</b> <a class="float-right"></a>
                                </li>
                            </ul>
                            <a href="#" class="btn btn-primary btn-block"><b></b></a>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">{{ trans('en.tag.member_timeline') }}</a></li>
                                <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">{{ trans('en.tag.member_question') }}</a></li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="activity">
                                    <!-- Post -->
                                    @foreach($posts as $post)
                                        <div class="post">
                                            <div class="user-block">
                                                <img class="img-circle img-bordered-sm" src="{{ asset('source/admin/dist/img/user1-128x128.jpg') }}">
                                                <span class="username">
                                                <a href="#">{{ $post->title }}</a>
                                                <a href="#" class="float-right btn-tool"></a>
                                            </span>
                                                <span class="description">{{ $post->created_at }}</span>
                                            </div>
                                            <div view="post-user-detail">
                                                <p class="more">
                                                    {!! $post->content !!}
                                                </p>
                                            </div>
                                        </div>
                                    @endforeach
                                    <div>
                                        {{ $posts->links() }}
                                    </div>
                                    <!-- /.post -->
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="timeline">
                                    <!-- The timeline -->
                                    @foreach($questions as $question)
                                        <div class="post">
                                            <div class="user-block">
                                                <img class="img-circle img-bordered-sm" src="{{ asset('source/admin/dist/img/user1-128x128.jpg') }}">
                                                <span class="username">
                                            <a href="#">{{ $question->title }}</a>
                                            <a href="#" class="float-right btn-tool"></a>
                                            </span>
                                                <span class="description">{{ $question->created_at }}</span>
                                            </div>
                                            <!-- /.user-block -->
                                            <h3 class="profile-username text-left">{{ trans('en.tag.topic') }}: {{ $question->topic->name }}</h3>
                                            <p class="more">
                                                {{ $question->content }}
                                            </p>
                                        </div>
                                    @endforeach
                                    <div>
                                        {{ $questions->links() }}
                                    </div>
                                    <!-- /.post -->
                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.nav-tabs-custom -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection