@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-6">
        <h3>Enter Sales Information</h3>
        <form action="{{route('storeSales')}}" method="post">
            {{csrf_field()}}
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" class="form-control" name="name" placeholder="Enter Name of Item">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Cost</label>
                <input type="number" class="form-control" name="cost" placeholder="Enter Cost">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Sales</label>
                <input type="number" class="form-control" name="sales" placeholder="Enter Total Sales">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Profits</label>
                <input type="number" class="form-control" name="profits" placeholder="Enter Total Profits">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <div class="row">
        {{
        \koolreport\widgets\google\ColumnChart::create(array('dataSource' => \Illuminate\Support\Facades\DB::table('sales')->select('Name','Sales','Profits','Costs')->get(),    "colorScheme"=>array(
        "#e7717d",
        "#c2cad0",
        "#c2b9b0",
        "#7e685a",
        "#afd275"
    )))
        }}
    </div>
    <div class="row">
        {{\koolreport\widgets\google\BarChart::create(array('dataSource' => \Illuminate\Support\Facades\DB::table('sales')->select('Name','Sales','Profits','Costs')->get()))
        }}
    </div>
    <div class="row">
        {{
        \koolreport\widgets\google\PieChart::create(array('dataSource' => \Illuminate\Support\Facades\DB::table('sales')->select('Name','Sales','Profits','Costs')->get()))
        }}
    </div>
    <div class="row">
        {{
        \koolreport\widgets\google\AreaChart::create(array('dataSource' => \Illuminate\Support\Facades\DB::table('sales')->select('Name','Sales','Profits','Costs')->get()))

        }}
    </div>
    <div class="row">
        {{
        \koolreport\widgets\google\SteppedAreaChart::create(array('dataSource' => \Illuminate\Support\Facades\DB::table('sales')->select('Name','Sales','Profits','Costs')->get()))

        }}
    </div>
    <div class="row">
        {{
        \koolreport\widgets\google\Histogram::create(array('dataSource' => \Illuminate\Support\Facades\DB::table('sales')->select('Name','Sales','Profits','Costs')->get()))

        }}
    </div>
    <div class="row">
        {{\koolreport\widgets\google\ScatterChart::create(array('dataSource' => \Illuminate\Support\Facades\DB::table('sales')->select('Name','Sales','Profits','Costs')->get()))
       }}
    </div>
</div>


@endsection
