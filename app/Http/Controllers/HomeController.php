<?php

namespace App\Http\Controllers;

use App\Sales;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use koolreport\widgets\google\LineChart;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Sales $sales)
    {
       $data = $sales->getDataForReport();
        return view('home', ['data' => $data]);
    }

    public function storeSales(Request $request)
    {
        $sales = new  Sales();
        $sales->Name = $request->name;
        $sales->Costs = $request->cost;
        $sales->Profits = $request->profits;
        $sales->Sales = $request->sales;
        $sales->save();
        return redirect()->back();
    }

    public function viewSales()
    {
        $data = Sales::paginate(10);
        return view('sales', ['datas'=> $data]);
    }

    public function editSales($id)
    {
        $sales  = Sales::find($id);

        return view('edit', ['salesData' => $sales]);

    }

    public function updateSales(Request $request,$id)
    {
        $sales = Sales::find($id);
        $sales->Name = $request->name;
        $sales->Costs = $request->cost;
        $sales->Profits = $request->profits;
        $sales->sales  = $request->sales;
        $sales->save();
        return redirect('addData');
    }

    public function deleteSales($id)
    {
        $sales = Sales::find($id);
        $sales->delete();
        return redirect('addData');
    }


    public function showCsvScreen()
    {
        return view('showCsv');
    }

    public function parseCsv(Request $request)
    {
        $file = $request->file('csv_file');
        if($file->getClientOriginalExtension() !== 'csv'){
           return redirect()->back()->with('message', '<span class="alert alert-danger">Invalid File Type</span><br><br>');
        }
        $fileData = array_map('str_getcsv',file($file->getRealPath()));
        foreach (array_slice($fileData,1) as $data){
            $sales = new Sales();
            $sales->Name = $data[0];
            $sales->Costs = $data[1];
            $sales->Profits = $data[2];
            $sales->sales  = $data[3];
            $sales->save();
        }
        return redirect('/home')->with('message', '<span class="alert alert-success" role="success">Data From File Imported!!</span><br><br>');
    }
}
