<?php

?>
@extends('layouts.appAdmin')

@section('content')


<!-- check for error -->
@if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

<div class="container">
<div class="row justify-content-md-center mt-5">
  <div class="col-md-8">
    <div class="card">
    <!-- Bootstrap Boilerplate... -->
    <div class="card-header">Create New Floor</div>
    <div class = "card-body">
        <!-- New Zone Form -->
        {!! Form::model($floor, [
            'route' => ['floor.store'],
            'class' => 'form-horizontal'
        ]) !!}

            <!-- Code -->
            <div class="col-md-10 form-group row text-md-right">
                {!! Form::label('floor-code', 'Floor Level Code', [
                    'class' => 'col-md-5 control-label ',
                ]) !!}
                <div class="col-sm-6">
                    {!! Form::text('code', null, [
                        'id'        => 'floor-code',
                        'class'     => 'form-control',
                        'maxlength' => 2,
                    ]) !!}
                </div>
            </div>

            <!-- Submit Button -->
            <div class="form-group row">
                <div class="col-sm-offset-10 col-sm-6">
                    {!! Form::button('Save', [
                        'type'  => 'submit',
                        'class' => 'btn btn-primary offset-md-9',
                    ]) !!}
                </div>
            </div>
        {!! Form::close() !!}
     </div>

     </div>
     </div>
      </div>
      </div>


</div>

@endsection
