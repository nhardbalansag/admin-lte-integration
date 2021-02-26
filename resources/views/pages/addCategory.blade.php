@extends('home', ['activePage' => 'createCategory'])
@section('mainDashboard')

<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Category <small>Adding of category</small></h3>
    </div>
    <!-- /.card-header -->
    @if(session()->has('message'))
        <div class="alert alert-success mt-5" role="alert">
            {{ session()->get('message') }}
        </div>
    @endif
    <!-- form start -->
    <form action="/submit-category/submit" method="post" role="form" id="quickForm" novalidate="novalidate">
        <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Category title</label>
          <input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="title here">
            @error('title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Category Description</label>
          <input type="text" name="description" class="form-control" id="exampleInputPassword1" placeholder="description here">
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Status</label>
            <select name="status" class="form-control" id="exampleFormControlSelect1">
              <option>Select Status</option>
              <option value="publish">Publish</option>
              <option  value="pending">Pending</option>
            </select>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
      </div>
    </form>
  </div>

@endsection
