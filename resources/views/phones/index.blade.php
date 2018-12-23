<?php
/**
 * Created by PhpStorm.
 * User: Limitless
 * Date: 23.12.2018 г.
 * Time: 18:41
 */
?>

@extends('layouts.app')

@section('content')
    <h1>Phones</h1>
        @foreach($phone as $phones)
            <div class="well">
                <h3>{{$phone->name}}</h3>
            </div>
        @endforeach
@endsection