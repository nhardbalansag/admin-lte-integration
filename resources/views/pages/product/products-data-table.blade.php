@extends('home',  ['activePage' => 'dataTable'])
@section('mainDashboard')

<div class="card card-primary">
     <!-- SEARCH FORM -->
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">DataTable</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example2" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>CategoryProduct Title</th>
              <th>Category</th>
              <th>Status</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($data as $item => $value)
                <tr>
                    <td>{{  $value->title }}</td>
                    <td>
                        {{  $value->productCategorytitle }}
                    </td>
                    <td class="{{ $value->status == 'pending' ? 'text-warning' : 'text-success' }}">{{  $value->status }}</td>
                </tr>
            @endforeach
            </tfoot>
            </tbody>
          </table>
        </div>
      </div>
</div>

@endsection
