@extends('home',  ['activePage' => 'createProduct'])
@section('mainDashboard')

<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Product <small>Adding of product</small></h3>
    </div>
    <!-- /.card-header -->
    @if(session()->has('message'))
        <div class="alert alert-success mt-5" role="alert">
            {{ session()->get('message') }}
        </div>
    @endif

    @if (session()->has('error'))
        <div class="alert alert-warning mt-5" role="alert">
            {{ session()->get('error') }}
        </div>
    @endif
    <!-- form start -->
    <form action="/product/add-product" method="post" role="form" id="quickForm" novalidate="novalidate">
        <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Product title</label>
                <input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="title here">
                @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                 @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Product Description</label>
                <input type="text" name="description" class="form-control" id="exampleInputPassword1" placeholder="description here">
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Status</label>
                <select name="status" class="form-control" id="exampleFormControlSelect1">
                    <option> - Select Status - </option>
                    <option value="publish">Publish</option>
                    <option  value="pending">Pending</option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Product Category</label>
                <select name="product_category_id" class="form-control" id="exampleFormControlSelect1">
                    <option> - Select Status - </option>
                    @foreach ($categories as $item => $value)
                        <option value="{{ $value->id }}">{{ $value->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
</div>
@endsection
