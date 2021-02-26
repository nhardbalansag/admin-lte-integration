<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\QueryBuilders\ProductQuery;
use Illuminate\Support\Facades\{Validator, DB};

class ChartController extends Controller
{
    public function index(){

        $data['allproducts'] = ProductQuery::getCharts();

        return view('charts.chart', $data);
    }
}




