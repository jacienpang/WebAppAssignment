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
          <div class="card-header">Create New Category</div>
          <div class = "card-body">
          <div class = "panel-body">
            <!-- New Category Form -->
            {!! Form::model($category, [
                'route' => ['category.store'],
                'class' => 'form-horizontal'
            ]) !!}

                <!-- Name -->
                <div class="col-md-10 form-group row text-md-right">
                    {!! Form::label('category-name', 'Category Name', [
                        'class' => 'control-label col-sm-4',
                    ]) !!}
                    <div class="col-sm-8">
                        {!! Form::text('name', null, [
                            'id'        => 'category-name',
                            'class'     => 'form-control',
                            'maxlength' => 20,
                        ]) !!}
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="form-group row">
                    <div class="col-sm-offset-3 col-sm-6">
                        {!! Form::button('Save', [
                            'type'  => 'submit',
                            'class' => 'btn btn-primary offset-md-8',
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
