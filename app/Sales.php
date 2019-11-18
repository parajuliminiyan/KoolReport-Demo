<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Sales extends Model
{
    protected $fillable = [
        'Name', 'Costs', 'Profits', 'Sales'
    ];
    public function getDataForReport()
    {
        $data = DB::table('sales')->select('Name','Sales','Profits', 'Costs')->get();
        return $data;
    }
}
