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
    <form action="/search" method="POST" role="search">
        {{ csrf_field() }}
        <div class="input-group">
            <input type="text" class="form-control" name="q"
                   placeholder="Search by YOP, model and manufacturer"> <span class="input-group-btn">
            <button type="submit" class="btn btn-default">
                <span class="glyphicon glyphicon-search"></span>
            </button>
        </span>
        </div>
    </form>
    </br>
    @if(count ($phones) > 0)
        @foreach($phones as $phone)
            <div class="well">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <img style="width: 100%;" src="/storage/phone_images/{{$phone->phone_image}}">
                    </div>
                    <div class="col-md-8 col-sm-8">
                        <h2><a href="/phones/{{$phone->id}}">{{$phone->name}}</a></h2>
                        <small>{{$phone->user->name}} added it on {{$phone->created_at}}</small>
                    </div>
                </div>

            </div>
        @endforeach
    @else
        <h1>not found.</h1>
    @endif
@endsection