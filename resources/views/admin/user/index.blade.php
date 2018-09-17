@extends('admin/layouts/index')
@section('content')
    <!-- <example></example> -->
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ trans('en.title.member_index') }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{ trans('en.title.home') }}</a></li>
                        <li class="breadcrumb-item active">{{ trans('en.title.member_index') }}</li>
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
                        <h3 class="card-title">{{ trans('en.title.member_index_card') }}</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>{{ trans('en.form.name') }}</th>
                                <th>{{ trans('en.form.email') }}</th>
                                <th>{{ trans('en.form.birthday') }}</th>
                                <th>{{ trans('en.form.status') }}</th>
                                <th>{{ trans('en.form.action') }}</th>
                            </tr>
                            </thead>
                            <tbody id="user-table">
                            @foreach ($users as $user)
                                <tr id="row-{{ $user->id }}">
                                    <td>{{ $user->name}}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->birthday }}</td>
                                    <td id="status-{{ $user->id }}">
                                        @if ($user->status == 1)
                                            <span class="right badge badge-success badge-status active-{{ $user->id }}">
                                                {{ trans('en.form.activating') }}
                                            </span>
                                            <br>
                                            <hr>
                                            <i class="reject-{{ $user->id }}" id="status-block-now">
                                                <p class="show_input block-font" id="reason{{ $user->id }}">
                                                    <span class="right badge badge-danger badge-status">{{ trans('en.form.block_now') }}</span>
                                                </p>
                                            </i>
                                            <div id="show{{ $user->id }}" class="hidd" style="display: none; ">
                                                {!! Form::text('reason', null, ['id' => "rea$user->id"]) !!}
                                                {!! Form::hidden('url', config('blog.base_url'), ['id' => 'url']) !!}
                                                <span href="javascript:void(0)" data-url="{{ route('admin.users.inactive', $user->id) }}"
                                                      class="block-font send" id="re{{ $user->id }}">
                                            <i class="fa fa-paper-plane" aria-hidden="true"></i>
                                            </span>
                                            </div>
                                        @else
                                            <p class="show_input block-font" id="reject-{{ $user->id }}">
                                                <span class="right badge badge-danger badge-status">
                                                    {{ trans('en.form.blocked') }}
                                                </span><br>
                                                <span id="reason">{{ $user->block_reason }}</span><hr>
                                            </p><br>
                                            <p>
                                                <span class="right badge badge-success block-font badge-status active-now"
                                                      id="active-now-{{ $user->id }}"
                                                      data-url="{{ route('admin.users.active', $user->id) }}">
                                                    {{ trans('en.form.active_now') }}
                                                </span>
                                            </p>
                                        @endif
                                        <div id="text-show{{ $user->id }}" class="text-reason">
                                        </div>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.users.show', $user->id) }}">
                                            <button type="button"
                                                    class="btn btn-block btn-outline-info btn-sm">{{ trans('en.button.profile') }}</button>
                                        </a>
                                        <hr>
                                        <p class="del-button" id="{{ $user->id }}" data-url="{{ route('admin.users.destroy', $user->id) }}">
                                            <button type="button" class="btn btn-block btn-outline-danger btn-sm">{{ trans('en.button.delete') }}</button>
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
