@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            S M T P
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($sMTP, ['route' => ['sMTPS.update', $sMTP->id], 'method' => 'patch']) !!}

                        @include('s_m_t_p_s.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection