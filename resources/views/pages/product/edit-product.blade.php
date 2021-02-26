@extends('home',  ['activePage' => 'editProduct'])
@section('mainDashboard')

<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Product <small>Edit product</small></h3>
    </div>
    <!-- /.card-header -->
    @if(session()->has('message'))
        <div class="alert alert-success mt-5" role="alert">
            {{ session()->get('message') }}
        </div>
    @elseif(session()->has('error'))
    <div class="alert alert-warning mt-5" role="alert">
        <p class="text-white">
            {{ session()->get('error') }}
        </p>
    </div>
    @endif
    <!-- form start -->
    <form action="/product/edit-product/submit/{{ $products->id }}" method="post" role="form" id="quickForm" novalidate="novalidate">
        <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Product title</label>
                <input value="{{ $products->title }}" type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="title here">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Product Description</label>
                <input value="{{ $products->description }}" type="text" name="description" class="form-control" id="exampleInputPassword1" placeholder="description here">
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Status</label>
                <select  placeholder="{{ $products->status }}" value="{{ $products->status }}" name="status" class="form-control" id="exampleFormControlSelect1">
                    <option> - Select Status - </option>
                    <option {{$products->status === 'publish' ? 'selected' : '' }} value="publish">Publish</option>
                    <option {{$products->status === 'pending' ? 'selected' : '' }} value="pending">Pending</option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Product Category</label>
                <select value="{{ $products->product_category_id  }}" name="product_category_id" class="form-control" id="exampleFormControlSelect1">
                    @foreach ($categories as $item => $value)
                        <option {{ $value->id === $products->product_category_id ? 'selected' : '' }}  value="{{ $value->id }}">
                            {{ $value->title }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit Edit</button>
            </div>
        </div>
    </form>
  </div>
@endsection
