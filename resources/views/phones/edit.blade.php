<?php
/**
 * Created by PhpStorm.
 * User: Limitless
 * Date: 30.12.2018 г.
 * Time: 13:08
 */
?>

@extends('layouts.app')

@section('content')
    <div style="padding-left: 2%; padding-right: 5%; padding-top: 3%;">
        <h1>Edit phone</h1>
        {!! Form::open(['action' => ['PhonesController@update', $phone->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('name', 'Enter a name:')}}
            {{Form::text('name', $phone->name, ['class' => 'form-control', 'placeholder' => 'Name'])}}
        </div>

        <div class="form-group">
            {{Form::label('model', 'Enter a model:')}}
            {{Form::text('model', $phone->model, ['class' => 'form-control', 'placeholder' => 'Phone model'])}}
        </div>

        <div class="form-group">
            {{Form::label('manufacturer', 'Enter a manufacturer:')}}
            {{Form::text('manufacturer', $phone->manufacturer, ['class' => 'form-control', 'placeholder' => 'Manufacturer'])}}
        </div>

        <div class="form-group">
            {{Form::label('productionYear', 'Enter the year of production:')}}
            {{Form::text('productionYear', $phone->productionYear, ['class' => 'form-control', 'placeholder' => 'YOP'])}}
        </div>
        <div class="form-group">
            {{Form::file('phone_image')}}
        </div>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
        <a href="/phones" class="btn btn-default">Previous Page</a>
        {!! Form::close() !!}
    </div>
@endsection

