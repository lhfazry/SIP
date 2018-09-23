@extends('admin/admin')
@section('content')
    <div class="row">
        <div class="col-12">
            <!-- <form method="POST" action="{{ URL::to('admin/category') }}">
                {{ csrf_field() }} -->
            {{ Form::open(['route'=>'product.store', 'files'=>true]) }}
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Add Product</h3>
                    </div>
                    <div class="card-body">
                        @if(!empty($errors->all()))
                        <div class="alert alert-danger">
                            {{ Html::ul($errors->all())}}
                        </div>
                        @endif
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('category_id', 'Category') }}
                                    {{ Form::select('category_id', $categories, null, ['class'=>'form-control', 'placeholder'=>'Choose category']) }}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('name', 'Name') }}
                                    {{ Form::text('name', '', ['class'=>'form-control', 'placeholder'=>'Enter name']) }}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('price', 'Price') }}
                                    {{ Form::text('price', '', ['class'=>'form-control', 'placeholder'=>'Enter price']) }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('sku', 'SKU') }}
                                    {{ Form::text('sku', '', ['class'=>'form-control', 'placeholder'=>'Enter sku']) }}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('status', 'Status') }}
                                    {{ Form::select('status', ['active'=>'Active', 'inactive'=>'Inactive'], null,
                                        ['class'=>'form-control']) }}        
                                </div>
                                <div class="form-group">
                                    {{ Form::label('image', 'Image') }}
                                    {{ Form::file('image', ['class'=>'form-control']) }}        
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                {{ Form::label('description', 'Description') }}
                                {{ Form::textarea('description', '', ['class'=>'form-control', 'placeholder'=>'Enter description', 'rows'=>5]) }}
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ URL::to('admin/product') }}" class="btn btn-outline-info">Back</a>
                        {{ Form::submit('Add Product', ['class' => 'btn btn-primary pull-right']) }}
                    </div>
                </div>
            <!-- </form> -->
            {{ Form::close() }}
        </div>
    </div>
@endsection