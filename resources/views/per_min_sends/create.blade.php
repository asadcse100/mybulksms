@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Per Min Send
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'perMinSends.store']) !!}

                        @include('per_min_sends.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection