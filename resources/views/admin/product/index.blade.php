@extends('admin/admin')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Products</h3>

                    <div class="card-tools">
                        <a href="{{ URL::to('admin/product/create') }}" class="btn btn-tool"><i class="fa fa-plus"></i> &nbsp; Add</a>
                    </div>
                </div>
                <div class="card-body">
                    @if (Session::has('message'))
                    <div id="alert-msg" class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        {{ Session::get('message') }}
                    </div>
                    @endif

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ Form::label('category', 'Category') }}
                                {{ Form::select('category', $categories, $cat_id,
                                        ['class'=>'form-control', 'placeholder' => 'All Category']) }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ Form::label('search', 'Search') }}
                                {{ Form::text('search', $keyword, ['class'=>'form-control', 'placeholder'=>'Enter keyword']) }}
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr class="text-center">
                                        <th>ID</th>
                                        <th>Category</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>SKU</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $product)
                                    <tr>
                                        <td class="text-center">{{ $product['id'] }}</td>
                                        <td>{{ $product->category['name'] }}</td>
                                        <td>{{ $product['name'] }}</td>
                                        <td>{{ $product['price'] }}</td>
                                        <td>{{ $product['sku'] }}</td>
                                        <td class="text-center"><img src="{{ asset('storage/'.$product['image']) }}" width="100"/></td>
                                        <td class="text-center">{{ ucfirst($product['status']) }}</td>
                                        <td class="text-center">
                                            <form method="POST" action="{{ URL::to('/admin/product/'.$product['id']) }}">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="_method" value="DELETE" />
                                                <div class="btn-group">
                                                    <a class="btn btn-info" href="{{ URL::to('/admin/product/'.$product['id']) }}"><i class="fa fa-eye"></i></a>
                                                    <a class="btn btn-success" href="{{ URL::to('/admin/product/'.$product['id'].'/edit') }}"><i class="fa fa-pencil"></i></a>
                                                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            {{ $products->appends($_GET)->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure to delete this product?
            </div>
            <form id="form-delete" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="DELETE" />
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button id="btn-submit" type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $(document).on('click', '.btn-delete', function(){
                // ambil id dari button
                var id = $(this).data('id');

                // pasang action form
                $('#form-delete').attr('action', "{{ URL::to('/admin/product/') }}/" + id);
            });   

             $('#category').on('change', function() {
                // ambil category id
                //var catId = this.value;

                // redirect
                //window.location.replace("{{ URL::to('admin/product') }}?cat_id=" + catId);
                filter();
             });

            $('#search').keypress(function(event) {
                if(event.keyCode == 13) {
                    filter();
                }
             });

             var filter = function() {
                var catId = $('#category').val();
                var keyword = $('#search').val();

                window.location.replace("{{ URL::to('admin/product') }}?cat_id=" + catId + "&keyword=" + keyword);
             };
        });
    </script>
@endsection