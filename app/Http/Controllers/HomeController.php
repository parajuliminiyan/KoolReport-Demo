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

    public function viewSales(Sales $sales)
    {
        $data = $sales->all();
        return view('sales', ['data'=> $data]);
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
}
