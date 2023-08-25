@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>Upload CSV File</h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <h4>Please  Upload .csv</h4>
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'messageInfos.store', 'files' => true]) !!}

                        @include('message_infos.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
