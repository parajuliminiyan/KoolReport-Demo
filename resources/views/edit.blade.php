@extends('layouts.app')
@section('content')
<div class="container">
    <form action="{{route('updateSales',$salesData->id )}}" method="post">
        {{csrf_field()}}
        <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" class="form-control" name="name" value="{{$salesData->Name}}" required placeholder="Enter Name of Item">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Cost</label>
            <input type="number" class="form-control" name="cost" value="{{$salesData->Costs}}" placeholder="Enter Cost" required>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Sales</label>
            <input type="number" class="form-control" name="sales" value="{{$salesData->Sales}}" placeholder="Enter Total Sales" required>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Profits</label>
            <input type="number" class="form-control" name="profits" value="{{$salesData->Profits}}" placeholder="Enter Total Profits" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
</div>
@endsection
