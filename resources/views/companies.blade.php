@extends('home')

@section('title_table', 'Companies')

@section('companies')
        <div class="col-md-3 mb-3">
            <a href="{{ url('create') }}" class="btn btn-success">Create new company</a>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Website</th>
                <th scope="col">Email</th>
                <th>Options</th>
            </tr>
            </thead>
            <tbody>
            @foreach($companies as $company)
                <tr class="clickable-row" data-href="{{ url('company/'.$company->id.'/employers') }}">
                    <td>
                        {{$company->name}}
                    </td>
                    <td>{{$company->website}}</td>
                    <td>{{$company->email}}</td>
                    <td>
                        <a href ="{{ url('company/'.$company->id.'/edit') }}" class="btn btn-info mb-1">Edit</a>
                        <a href ="{{ url('company/'.$company->id.'/delete') }}" class="btn btn-danger mb-1">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="m-auto">
        {{ $companies->links() }}
        </div>
@endsection