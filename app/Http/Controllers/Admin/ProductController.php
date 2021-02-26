<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Http\Controllers\QueryBuilders\ProductQuery;
use Auth;

class ProductController extends Controller
{
    public function index(Request $request){

        return view('pages.addCategory');
    }

    public function createCategory(Request $request){

        $rules = [
			'title' => 'required|string|min:3|max:255|unique:product_categories',
			'description' => 'required|string|min:3|max:255',
			'status' => 'required|string|max:255'
		];

		$validator = Validator::make($request->all(),$rules);

		if ($validator->fails()) {

			return redirect()->back()->with('error', 'error adding category');

		}else{

            unset($request['_token']);

            if(!ProductQuery::create('product_categories',  $rules, $request)){
                return redirect()->back()->with('message', 'category successfully added');
            }else{
                return redirect()->back()->with('error', 'error adding category');
            }
        }
    }

    public function viewCategoryList(){

        $data['categories'] = ProductQuery::getList('product_categories');

        return view('pages.category-list-publish', $data);
    }

    public function productIndex(){

        $data['categories'] = ProductQuery::getList('product_categories', 'status', 'publish');

        return view('pages.product.create-product', $data);
    }

    public function createProduct(Request $request){

        $rules = [
			'title' => 'required|string|min:3|max:255|unique:products',
			'description' => 'required|string|min:3|max:255',
			'status' => 'required|string|max:255',
			'product_category_id' => 'required|integer|min:1'
		];

        unset($request['_token']);

        if(!ProductQuery::create('products',  $rules, $request)){
            return redirect()->back()->with('message', 'product successfully added');
        }else{
            return redirect()->back()->with('error', 'error adding product');
        }
    }

    public function editProductIndex($id){

        $filter_select = [
            'products.*',
            'product_categories.title as productCategorytitle'
        ];

        $data['products'] = ProductQuery::getFirst('products', 'products.id', $id, 'product_categories', 'product_categories.id', 'products.product_category_id', $filter_select);
        $data['categories'] = ProductQuery::getList('product_categories', 'status', 'publish');

        return view('pages.product.edit-product', $data);
    }

    public function submitEditProduct(Request $request, $id){

        $filter =[
            ['id', '!=', $id],
            ['title', '=',$request->title]
        ];

        unset($request['_token']);

        $result = $data['categories'] = ProductQuery::getOne('products',  $filter);

        if($result){

            return redirect()->back()->with('error', 'product has duplicate');
        }

        if(!ProductQuery::edit('products', $request, $id)){
            return redirect()->back()->with('message', 'product successfully edited');
        }else{
            return redirect()->back()->with('error', 'unable to edit');
        }
    }

    public function viewProductList(){

        $filter_select = [
            'products.*',
            'product_categories.title as productCategorytitle'
        ];

        $data['products'] = ProductQuery::getListPaginate('products', null, null, 10, 'product_categories', 'product_categories.id', 'products.product_category_id', $filter_select);

        return view('pages.product.product-list', $data);
    }

    public function editCategoryIndex($id){

        $data['categories'] = ProductQuery::getOne('product_categories', 'id', $id);

        return view('pages.edit-category', $data);
    }

    public function submitEditCategory(Request $request, $id){

        $rules = [
			'title' => 'required|string|min:3|max:255',
			'description' => 'required|string|min:3|max:255',
			'status' => 'required|string|max:255'
		];

		$validator = Validator::make($request->all(),$rules);

		if ($validator->fails()) {

			return redirect()->back()->with('error', 'unable to edit');

		}else{

            $filter =[
                ['id', '!=', $id],
                ['title', '=',$request->title]
            ];

            unset($request['_token']);

            $result = $data['categories'] = ProductQuery::getOne('products',  $filter);

            $data = $request->input();

            if($result){

                return redirect()->back()->with('error', 'product has duplicate');
            }

            if(!ProductQuery::edit('product_categories', $request, $id)){
                return redirect()->back()->with('message', 'category successfully edited');
            }else{
                return redirect()->back()->with('error', 'unable to edit');
            }
        }
    }

    public function dataTable(){

        $filter_select = [
            'products.*',
            'product_categories.title as productCategorytitle'
        ];

        $data['data'] = ProductQuery::getListPaginate('products', null, null, 2, 'product_categories', 'product_categories.id', 'products.product_category_id', $filter_select);

        return view('pages.product.products-data-table', $data);
    }

    public function logout(Request $request){

        $this->guard()->logout();

        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect('/');
    }

}
