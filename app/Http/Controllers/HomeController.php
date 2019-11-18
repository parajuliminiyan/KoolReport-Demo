<?php

namespace App\Http\Controllers;

use App\Sales;
use Illuminate\Http\Request;

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
    public function index()
    {
        return view('home');
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
}
