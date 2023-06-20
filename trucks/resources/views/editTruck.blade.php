@extends('layouts.main');

@section('content')
    <h2>Update Truck information</h2>

    <form method="POST" action="{{url('updateTruck/'.$truck->id)}}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Unit Number</label>
            <input type="text" name="unit_number" value="{{old('unit_number', $truck->unit_number)}}" class="form-control">
            @error('unit_number')
                <div class="alert alert-danger mt-1">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Year</label>
            <input type="number" name="year" value="{{old('year', $truck->year)}}" class="form-control">
            @error('year')
                <div class="alert alert-danger mt-1">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Notes</label>
            <input type="textarea" name="notes" value="{{old('notes', $truck->notes)}}" class="form-control">
        </div>
        <button class="btn btn-success">Update</button>

    </form>
@stop