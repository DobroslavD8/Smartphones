<?php
/**
 * Created by PhpStorm.
 * User: Limitless
 * Date: 2.1.2019 г.
 * Time: 23:34
 */
?>

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="panel-body">
                        <h3>Added smartphone models:</h3>
                        @if (is_array($phones) || is_object($phones))
                            <table class="table table-striped">
                                <tr>
                                    <th>Phone Models</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                @foreach($phones as $phone)
                                    <tr>
                                        <td>{{$phone->model}}</td>
                                    </tr>
                                @endforeach
                            </table>
                        @else
                            <p style="color: red; text-decoration: underline;">Phones not found!</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

