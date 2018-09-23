@extends('admin/admin')
@section('content')
    <div class="row">
        <div class="col-12">
            <!-- <form method="POST" action="{{ URL::to('admin/category') }}"> -->
            {{ Form::open(['url'=>'/admin/trx/import', 'files'=>true]) }}
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Import Excel</h3>
                    </div>
                    <div class="card-body">
                        @if(!empty($errors->all()))
                        <div class="alert alert-danger">
                            {{ Html::ul($errors->all()) }}
                        </div>
                        @endif
                        <div class="form-group">
                            {{ Form::label('excel', 'File Excel') }}
                            {{ Form::file('excel', ['class'=>'form-control']) }}        
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ URL::to('admin/trx') }}" class="btn btn-outline-info">Back</a>
                        {{ Form::submit('Import', ['class' => 'btn btn-primary pull-right']) }}
                    </div>
                </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection