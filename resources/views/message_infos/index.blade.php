@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Mail Infos</h1>
        <div class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{{ route('messageInfos.create') }}">Import Leads</a>&nbsp;&nbsp;
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{{ route('send') }}">Send All</a>&nbsp;&nbsp;
</div>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('message_infos.table')
            </div>
        </div>
        <div class="text-center">
        
        @include('adminlte-templates::common.paginate', ['records' => $messageInfos])

        </div>
    </div>
@endsection

