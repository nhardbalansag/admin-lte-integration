@extends('home',  ['activePage' => 'productList'])
@section('mainDashboard')
    <div class="row col-12">
        <div class="card-header col-12">
            <h3 class="card-title">All Products</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body col-12">
            <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12">
                        <table id="example2" class="table table-bordered table-hover dataTable dtr-inline collapsed" role="grid" aria-describedby="example2_info">
                            <thead>
                                <tr role="row">
                                    <th class="sorting_asc text-center" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                                        Title
                                    </th>
                                    <th class="sorting text-center" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">
                                        Product Category
                                    </th>
                                    <th class="sorting text-center" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                        Status
                                    </th>
                                    <th class="sorting text-center" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $item => $value)
                                    <tr role="row" class="odd">
                                        <td tabindex="0" class="sorting_1 text-center">{{  $value->title }}</td>
                                        <td class="text-center">{{  $value->productCategorytitle }}</td>
                                        <td class="text-center">
                                            <p class="{{ $value->status === 'publish' ? 'text-success' : 'text-warning' }}">
                                                {{  $value->status }}
                                            </p>
                                        </td>
                                        <td class="text-center">
                                          <a href="/product/edit-product/{{ $value->id }}" class="btn btn-primary">
                                            <i class="far fa-eye"></i>
                                          </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
