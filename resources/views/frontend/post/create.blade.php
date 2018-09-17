@extends('frontend/layouts/index')
@section('content')
    <div class="main">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="index.html">{{ trans('en.title.home') }}</a></li>
                <li><a href="javascript:;">Blog</a></li>
                <li class="active">Blog Item</li>
            </ul>
            <br>
            {!! Form::open(['route' => ['posts.store'] , 'method' => 'POST', 'files' => true]) !!}
            <div>
                <h2>Write your new post </h2>
                Content
                {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => trans('en.form.title')]) !!}
                <br>
                <div class="form-group">
                    <label>{{ trans('common.form.role') }}</label>
                    {!! Form::select('tags[]', $tags, null, ['class' => 'form-control select2', 'id' => 'tag', 'multiple' => true]) !!}
                </div>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>

