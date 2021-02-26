@extends('home',  ['activePage' => 'editCategory'])
@section('mainDashboard')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Category <small>edit category</small></h3>
    </div>
    <!-- /.card-header -->
    @if(session()->has('message'))
        <div class="alert alert-success mt-5" role="alert">
            {{ session()->get('message') }}
        </div>
    @endif
    <!-- form start -->
    <form action="/category/edit-category/submit/{{ $categories->id }}" method="post" role="form" id="quickForm" novalidate="novalidate">
        <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Category title</label>
          <input value="{{ $categories->title }}" type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="title here">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Category Description</label>
          <input value="{{ $categories->description }}" type="text" name="description" class="form-control" id="exampleInputPassword1" placeholder="description here">
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Status</label>
            <select name="status" class="form-control" id="exampleFormControlSelect1">
              <option>Select Status</option>
              <option {{ $categories->status === 'publish' ? 'selected' : '' }} value="publish">Publish</option>
              <option  {{ $categories->status === 'pending' ? 'selected' : '' }} value="pending">Pending</option>
            </select>
          </div>
          <div class="form-groupr">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
      </div>
    </form>
  </div>
@endsection
