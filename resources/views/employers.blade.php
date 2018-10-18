@extends('home')

@section('title_table', $company->name.' Employers')


@section('employers')
    <img src="/images/logo/{{$company->logo}}" style="width: 150px" class="ml-2"/>
    <a href="{{ url('/company/'.$company->id.'/employers/create/') }}" class="btn btn-success col-md-2 my-2 ml-1">Add a employer</a>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
    @foreach($employers as $employer)
            <tr>
                <th scope="row">{{$employer->first_name}}</th>
                <td>{{$employer->last_name}}</td>
                <td>{{$employer->email}}</td>
                <td>{{$employer->phone}}</td>
                <td>
                    <a href ="{{ url('/company/'.$company->id.'/employers/'.$employer->id.'/edit/') }}" class="btn btn-info mb-1">Edit</a>
                    <a href ="{{ url('/company/'.$company->id.'/employers/'.$employer->id.'/delete/') }}" class="btn btn-danger mb-1">Fire</a>
                </td>
            </tr>
    @endforeach
            </tbody>
        </table>

@endsection