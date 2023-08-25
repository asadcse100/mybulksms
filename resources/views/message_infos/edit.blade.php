@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>Message Info</h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($messageInfo, ['route' => ['messageInfos.update', $messageInfo->id], 'method' => 'patch', 'files' => true]) !!}

                        @include('message_infos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection