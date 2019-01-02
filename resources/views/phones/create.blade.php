<?php
/**
 * Created by PhpStorm.
 * User: Limitless
 * Date: 30.12.2018 г.
 * Time: 11:33
 */
?>

@extends('layouts.app')

@section('content')
    <div style="padding-left: 2%; padding-right: 5%; padding-top: 3%;">
    <h1>Add phone</h1>
    {!! Form::open(['action' => 'PhonesController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('name', 'Enter a name:')}}
            {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Name'])}}
        </div>

    <div class="form-group">
        {{Form::label('model', 'Enter a model:')}}
        {{Form::text('model', '', ['class' => 'form-control', 'placeholder' => 'Phone model'])}}
    </div>

    <div class="form-group">
        {{Form::label('manufacturer', 'Enter a manufacturer:')}}
        {{Form::text('manufacturer', '', ['class' => 'form-control', 'placeholder' => 'Manufacturer'])}}
    </div>

    <div class="form-group">
        {{Form::label('productionYear', 'Enter the year of production:')}}
        {{Form::text('productionYear', '', ['class' => 'form-control', 'placeholder' => 'YOP'])}}
    </div>
        <div class="form-group">
            {{Form::file('phone_image')}}
        </div>
    {{Form::submit('Add phone', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
    </div>
@endsection
