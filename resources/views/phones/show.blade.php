@extends('layouts.app')

@section('content')
    <div style="padding-left: 2%; padding-right: 5%; padding-top: 6%;">
        <a href="/phones" class="btn btn-default">Previous Page</a>
    <h1>{{$phone->name}}</h1>
    <div>
        <p>Phone model: {{$phone->model}}</p>
        <p>Manufacturer: {{$phone->manufacturer}}</p>
        <p>Production Year: {{$phone->productionYear}}</p>
    </div>
        <a href="/phones/{{$phone->id}}/edit" class="btn btn-default">Edit</a>
    </div>

    {!!Form::open(['action' => ['PhonesController@destroy', $phone->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
    {{Form::hidden('_method', 'DELETE')}}
    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
    {!!Form::close()!!}
@endsection