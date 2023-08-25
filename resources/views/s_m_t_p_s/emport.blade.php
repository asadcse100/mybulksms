@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>Upload CSV File</h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <h4>Please  Upload .csv file</h4>
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 's_m_t_p_s.emport_store', 'files' => true]) !!}

                        @include('s_m_t_p_s.emport_fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
