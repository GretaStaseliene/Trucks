@extends('layouts.main');

@section('content')
    <h1>Trucks panel</h1>
    <a href="{{ url('/newTruck') }}" class="btn btn-primary m-2">Add New Truck</a>

    @if(Session::has('success'))
    <div class="alert alert-success m-3">
        {{Session::get('success')}}
    </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Unit Number</th>
                <th>Year</th>
                <th>Notes</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($trucks as $truck)
                <tr>
                    <td>{{$truck->id}}</td>
                    <td>{{$truck->unit_number}}</td>
                    <td>{{$truck->year}}</td>
                    <td>{{$truck->notes}}</td>
                    <td>
                        <a href="{{url('singleTruck/'.$truck->id)}}" class="btn btn-primary">View</a>

                        <a href="{{url('editTruck/'.$truck->id)}}" class="btn btn-warning">Edit</a>

                        <a href="{{url('deleteTruck/'.$truck->id)}}" class="btn btn-danger" >Delete</a>

                        <a href="{{url('newSubunit')}}" class="btn btn-success">Add Subunit</a>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop