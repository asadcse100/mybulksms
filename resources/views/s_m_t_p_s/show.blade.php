@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            S M T P
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('s_m_t_p_s.show_fields')
                    <a href="{{ route('sMTPS.index') }}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
