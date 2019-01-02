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
    @if(count ($phones) > 0)
        @foreach($phones as $phone)
            <div class="well">
            <h2><a href="/phones/{{$phone->id}}">{{$phone->name}}</a></h2>
                <small>{{$phone->user->name}} added it on {{$phone->created_at}}</small>
            </div>
        @endforeach
    @else
        <h1>not found.</h1>
    @endif
@endsection