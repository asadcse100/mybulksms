@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Per Minute Sends</h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('per_min_sends.table')
            </div>
        </div>
        <div class="text-center">
        
        @include('adminlte-templates::common.paginate', ['records' => $perMinSends])

        </div>
    </div>
@endsection

