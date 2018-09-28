@extends('layouts.app')

@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col s12 m9 l10"><h1>@lang('global.content-tags.title')</h1>
                <ul>
                    <li>
                        <a href="{{ url('/admin/home') }}">
                            <i class="fa fa-home"></i>
                            Dashboard</a>
                    </li> /
                    <li>
                        <a href="{{ route('admin.content_tags.index') }}">
                            @lang('global.content-tags.title')</a>
                    </li> /
                    <li><span>@lang('global.app_edit')</span></li>
                </ul>
            </div>
            <div class="col s12 m3 l2 right-align">
                <a href="{{ route('admin.content_tags.index') }}" class="btn lighten-3 z-depth-0 chat-toggle">
                    @lang('global.app_back_to_list')
                </a>
            </div>
        </div>
    </div>


    <div class="card">
        {!! Form::model($content_tag, ['method' => 'PUT', 'route' => ['admin.content_tags.update', $content_tag->id]]) !!}
        <div class="title">
            <h5>@lang('global.app_edit')</h5>
        </div>

        <div class="content">
            <div class="row">
                <div class="col m6 s12">
                    {!! Form::label('title', trans('global.content-tags.fields.title').'') !!}
                    {!! Form::text('title', old('title'), ['class' => 'validate']) !!}
                    <span class="helper-text" data-error="@if($errors->has('title')){{ $errors->first('title') }}@endif" data-success="right"></span>
                </div>

                <div class="col m6 s12">
                    {!! Form::label('slug', trans('global.content-tags.fields.slug').'') !!}
                    {!! Form::text('slug', old('slug'), ['class' => 'validate']) !!}
                    <span class="helper-text" data-error="@if($errors->has('slug')){{ $errors->first('slug') }}@endif" data-success="right"></span>
                </div>
            </div>

            {!! Form::submit(trans('global.app_update'), ['class' => 'btn waves-effect waves-light white-text']) !!}
        </div>
        {!! Form::close() !!}
    </div>

@stop

