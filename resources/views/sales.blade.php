@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="col-md-12">
            {{csrf_field()}}
            <button class="btn btn-info float-right" data-toggle="modal" data-target="#AddDataForm">Add Data</button>
            <br><br>
            <table class="table">
                <tr>
                    <th>Name</th>
                    <th>Sales</th>
                    <th>Profits</th>
                    <th>Costs</th>
                    <th></th>
                </tr>
                @foreach($data as $data)
                <tr>
                        <td>{{$data->Name}}</td>
                        <td>{{$data->Sales}}</td>
                        <td>{{$data->Profits}}</td>
                        <td>{{$data->Costs}}</td>
                        <td><a href="{{route('editSalesData', $data->id)}}"> Edit</a> || <a href="{{route('deleteSales', $data->id)}}"  class="btn btn-danger btn-sm" type="button">Delete</a> </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>


{{---------------- Add Data  Modal ------------------------}}
    <div class="modal fade" id="AddDataForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Enter Sales Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('storeSales')}}" method="post">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" class="form-control" name="name" required placeholder="Enter Name of Item">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Cost</label>
                            <input type="number" class="form-control" name="cost" placeholder="Enter Cost" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Sales</label>
                            <input type="number" class="form-control" name="sales" placeholder="Enter Total Sales" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Profits</label>
                            <input type="number" class="form-control" name="profits" placeholder="Enter Total Profits" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    @endsection
