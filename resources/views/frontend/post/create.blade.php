
{{--<link rel="stylesheet" href="{{ asset('source/admin/plugins/select2/select2.css') }}">--}}
{{--<script src="{{ asset('source/admin/plugins/select2/select2.full.js') }}" type="text/javascript"></script>--}}
{{--<select class="js-example-basic-single" name="state">--}}
    {{--<option value="AL">Alabama</option>--}}
    {{--<option value="WY">Wyoming</option>--}}
{{--</select>--}}
{{--<script>--}}
    {{--$(document).ready(function() {--}}
        {{--$('.js-example-basic-single').select2();--}}
    {{--});--}}
{{--</script>--}}

@extends('frontend/layouts/index')
@section('content')
    <div class="main">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="index.html">Home</a></li>
                <li><a href="javascript:;">Blog</a></li>
                <li class="active">Blog Item</li>
            </ul>
            <br>
            {!! Form::open(['route' => ['posts.create'] , 'method' => 'post', 'files' => true]) !!}
            <div>
                <h2>Write your new post </h2>
                Content
                {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => trans('en.form.title')]) !!}
                Image
                {!! Form::file('image') !!}
            </div>
            <br>
            <div id="ckeditor-content">
                {!! Form::textarea('content', null, ['class' => 'ckeditor', 'id' => 'editor-post']) !!}
            </div>
            {!! Form::submit(trans('en.button.save'), ['class' =>'btn btn-primary']) !!}
            {!! Form::close() !!}
            <hr>
        </div>
    </div>
@stop

