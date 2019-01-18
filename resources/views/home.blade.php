@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h5 style="text-align: center;">You are logged in successfully!</h5>
                        <br>

                        <div style="text-align: center;"><a href="/phones/create" class="btn btn-primary">Add a new phone</a></div>
                </div>
                <div class="panel-body">
                    <h3>Your phones:</h3>
                    @if(count($phones) > 0)
                    <table class="table table-striped">
                        <tr>
                            <th>Name</th>
                            <th></th>
                            <th></th>
                        </tr>
                            @foreach($phones as $phone)
                                <tr>
                                    <td>{{$phone->name}}</td>
                                    <td><a href="/phones/{{$phone->id}}/edit" class="btn btn-default">Edit</a></td>
                                    <td>
                                        {!!Form::open(['action' => ['PhonesController@destroy', $phone->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                        {{Form::hidden('_method', 'DELETE')}}
                                        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                        {!!Form::close()!!}
                                    </td>
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
