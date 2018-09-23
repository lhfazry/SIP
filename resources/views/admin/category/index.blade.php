@extends('admin/admin')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Categories</h3>

                    <div class="card-tools">
                        <a href="{{ URL::to('admin/category/create') }}" class="btn btn-tool"><i class="fa fa-plus"></i> &nbsp; Add</a>
                    </div>
                </div>
                <div class="card-body">
                    @if (Session::has('message'))
                    <div id="alert-msg" class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        {{ Session::get('message') }}
                    </div>
                    @endif

                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr class="text-center">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                            <tr>
                                <td class="text-center">{{ $category['id'] }}</td>
                                <td>{{ $category['name'] }}</td>
                                <td class="text-center">{{ ucfirst($category['status']) }}</td>
                                <td class="text-center">
                                    <form method="POST" action="{{ URL::to('/admin/category/'.$category['id']) }}">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="DELETE" />
                                        <div class="btn-group">
                                            <a class="btn btn-info" href="{{ URL::to('/admin/category/'.$category['id']) }}"><i class="fa fa-eye"></i></a>
                                            <a class="btn btn-success" href="{{ URL::to('/admin/category/'.$category['id'].'/edit') }}"><i class="fa fa-pencil"></i></a>
                                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                            <button type="button" class="btn btn-warning btn-delete" data-toggle="modal" data-target="#delete-modal" data-id="{{ $category['id'] }}"><i class="fa fa-trash"></i></button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
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
                Are you sure to delete this category?
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
                $('#form-delete').attr('action', "{{ URL::to('/admin/category/') }}/" + id);
            });    
        });
    </script>
@endsection