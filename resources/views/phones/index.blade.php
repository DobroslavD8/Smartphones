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
    <br>
    <br>
    <h1>Phones</h1>
    @if(count ($phones) > 0)
        @foreach($phones as $phone)
            <div class="well">
            <h3><a href="/phones/{{$phone->id}}">{{$phone->name}}</a></h3>
                <small>Added on: {{$phone->created_at}}</small>
            </div>
        @endforeach
    @else
        <h1>not found.</h1>
    @endif
@endsection