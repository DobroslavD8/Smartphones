@extends('layouts.app')

@section('content')
    <br>
    <br>
    <h1>{{$phone->name}}</h1>
    <div>
        <p>Phone model: {{$phone->model}}</p>
        <p>Manufacturer: {{$phone->manufacturer}}</p>
        <p>Production Year: {{$phone->productionYear}}</p>
    </div>
@endsection