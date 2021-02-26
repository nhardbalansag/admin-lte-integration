<?php

namespace App\Http\Controllers\QueryBuilders;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\{Validator, DB};
use Illuminate\Http\Request;
use App\Admin\{ProductCategory, Product};
use DateTime;

class ProductQuery extends Controller
{
    public static function getList($model, $filter = null, $tofilter = null, $limit = 10){

        $data   = DB::table($model)
                ->where($filter, $tofilter)
                ->paginate($limit);

        return $data;

    }

    public static function getFirst($model, $filter = null, $tofilter = null, $joinModel = null, $tocompareJoin = null, $baseModelJoin = null, $select = null){

        $data   = DB::table($model)
                ->join($joinModel, $tocompareJoin, '=', $baseModelJoin)
                ->select($select)
                ->where($filter, $tofilter)
                ->first();

        return $data;

    }

    public static function getOne($model, $filter = null, $tofilter = null){

        $data   = DB::table($model)
                ->where($filter,  $tofilter)
                ->first();

        return $data;

    }

    public static function getListPaginate($model, $filter = null, $tofilter = null, $limit = 10, $joinModel = null, $tocompareJoin = null, $baseModelJoin = null, $select = null){

        $data   = DB::table($model)
                ->join($joinModel, $tocompareJoin, '=', $baseModelJoin)
                ->select($select)
                ->where($filter, $tofilter)
                ->get();

        return $data;

    }

    public static function create($model, $rules, $request){

        $data = $request->input();

        switch ($model) {
            case 'products':
                Product::create([
                        'title' => $data['title'],
                        'description' => $data['description'],
                        'status' => $data['status'],
                        'product_category_id' => $data['product_category_id']
                    ]);
                break;

            case 'product_categories':
                ProductCategory::create([
                    'title' => $data['title'],
                    'description' => $data['description'],
                    'status' => $data['status']
                ]);

                break;
            }
    }

    public static function edit($model, $request, $filter){

        $data = $request->input();

        switch ($model) {
            case 'products':
                DB::table('products')
                    ->where('id', $filter)
                    ->update(
                        [
                            'title' => $data['title'],
                            'description' => $data['description'],
                            'status' => $data['status'],
                            'product_category_id' => $data['product_category_id']
                        ]);
                break;

            case 'product_categories':
                DB::table('product_categories')
                    ->where('id', $filter)
                    ->update(
                        [
                            'title' => $data['title'],
                            'description' => $data['description'],
                            'status' => $data['status']
                        ]);
                break;
        }
    }

    public static function getCharts(){

        $returnData = DB::table('products')
                    ->select(
                        DB::raw('
                            count(*) as itemCount,
                            MONTH(created_at) month,
                            YEAR(CURDATE()) year
                        '))
                    ->where(DB::raw('YEAR(created_at)'), DB::raw('YEAR(CURDATE())'))
                    ->groupBy(DB::raw('MONTH(created_at)'))
                    ->get();

        $month = array();
        $values = array();
        $year = array();

        for($i = 0; $i < count($returnData); $i++){
            $dateObj   = DateTime::createFromFormat('!m',$returnData[$i]->month);
            $monthName = $dateObj->format('F'); // March
            array_push($month, $monthName);
            array_push($values,$returnData[$i]->itemCount);
            array_push($year, $returnData[$i]->year);
        }

        $data['month'] = $month;
        $data['data'] = $values;
        $data['year'] = $year;

        $data['publish']  = DB::table('products')
                        ->select('status', DB::raw('count(id) as count'))
                        ->groupBy('status')
                        ->get();

        $labelarrr = array();
        $dataArr = array();

        foreach ($data['publish']  as $key => $value) {
            array_push($labelarrr, $value->status);
            array_push($dataArr, $value->count);
        }

        $data['piedata'] = array(
            $labelarrr,
            $dataArr
        );

        return $data;
    }

}
