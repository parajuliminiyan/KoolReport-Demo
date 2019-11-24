@extends('layouts.app')

@section('content')
<div class="container">
    @if (Session::has('message'))

        {!! Session::get('message')  !!}


    @endif
   <div class="col-md-12">
       <h2>Report of Restaurant Sales and Profits</h2>
       {{
            \koolreport\widgets\google\LineChart::create(array('dataSource'=> $data))
        }}
       <br>
       <center><span><u>Line Graph</u></span></center>
   </div>
    <br><br>
    <div class="col-md-12">
        {{
        \koolreport\widgets\google\PieChart::create(array('dataSource'=> $data))
        }}
        <center><span><u>Pie Chart</u></span></center>
    </div>
    <br><br>
    <div class="col-md-12">
        {{
        \koolreport\widgets\google\ScatterChart::create(array('dataSource'=>$data))
        }}
        <center><span><u>Scatter Chart</u></span></center>
    </div>
</div>

@endsection
