@extends('layouts.main');

@section('content')
    <h2>New Truck</h2>

    <form method="POST" action="{{url('/newTruck')}}">
        @csrf

        <div class="mb-3">
            <label class="form-label">Unit Number</label>
            <input type="text" name="unit_number" value="{{old('unit_number')}}" class="form-control">
            @error('unit_number')
                <div class="alert alert-danger mt-1">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Year</label>
            <input type="number" name="year" value="{{old('year')}}" class="form-control">
            @error('year')
                <div class="alert alert-danger mt-1">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Notes</label>
            <input type="textarea" name="notes" value="{{old('notes')}}" class="form-control">
        </div>
        <button class="btn btn-success">Add</button>

    </form>
@stop