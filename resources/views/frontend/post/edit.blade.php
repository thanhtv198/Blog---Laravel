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
            {!! Form::open(['route' => ['posts.update', $post->id] , 'method' => 'patch', 'files' => true]) !!}
            <div>
                <h2>Write your new post </h2>
                Content
                {!! Form::text('title', $post->title, ['class' => 'form-control', 'placeholder' => trans('en.form.title')]) !!}
                Image
                {!! Form::file('image') !!}
            </div>
            <br>
            <div id="ckeditor-content">
                {!! Form::textarea('content', $post->content, ['class' => 'ckeditor', 'id' => 'editor-post']) !!}
            </div>
            {!! Form::submit(trans('en.button.save'), ['class' =>'btn btn-primary']) !!}
            {!! Form::close() !!}
            <hr>
        </div>
    </div>
@stop
<style>
    #facebook .hidden_elem {
        display: block !important;
    }
</style>


