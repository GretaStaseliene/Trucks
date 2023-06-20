@extends('layouts.main');

@section('content')
    <h2>Add Subunit</h2>

    @if(Session::has('error'))
        <div class="alert alert-danger m-2">
            {{ Session::get('error') }}
        </div>
    @endif

    <form method="POST" action="{{url('/newSubunit')}}">
        @csrf

        <div class="mb-3">
            <label class="form-label">Main Truck</label>
            <input type="text" name="main_truck" value="{{old('unit_number')}}" class="form-control">
            @error('main_truck')
                <div class="alert alert-danger mt-1">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Subunit</label>
            <input type="number" name="subunit" class="form-control">
            @error('subunit')
                <div class="alert alert-danger mt-1">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Start date</label>
            <input type="date" name="start_date" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">End date</label>
            <input type="date" name="end_date" class="form-control">
        </div>
        <button class="btn btn-success">Add subunit</button>

    </form>
@stop