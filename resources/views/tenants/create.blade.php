<?php
use App\Zone;
use App\Floor;
use App\Category;
?>
@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class = "panel-body">
        <!-- New Tenant Form -->
        {!! Form::model($tenant, [
            'route' => ['tenant.store'],
            'class' => 'form-horizontal'
        ]) !!}

            <!-- Name -->
            <div class="form-group row">
                {!! Form::label('tenant-name', 'Tenant Name', [
                    'class' => 'control-label col-sm-3',
                ]) !!}
                <div class="col-sm-9">
                    {!! Form::text('name', null, [
                        'id'        => 'tenant-name',
                        'class'     => 'form-control',
                        'maxlength' => 100,
                    ]) !!}
                </div>
            </div>

            <!-- Lot Number -->
            <div class="form-group row">
                {!! Form::label('tenant-lot_number', 'Lot Number', [
                    'class' => 'control-label col-sm-3',
                ]) !!}
                <div class="col-sm-9">
                    {!! Form::text('lot_number', null, [
                        'id'        => 'tenant-lot_number',
                        'class'     => 'form-control',
                        'maxlength' => 10,
                    ]) !!}
                </div>
            </div>

            <!-- Zone -->
            <div class="form-group row">
                {!! Form::select('zone_id',
                    Zone::pluck('code', 'id'), null, [
                        'class' => 'form-control',
                        'placeholder' => '- Select Zone -',
                ]) !!}
            </div>

            <!-- Floor -->
            <div class="form-group row">
                {!! Form::select('floor_id',
                    Floor::pluck('code', 'id'), null, [
                        'class' => 'form-control',
                        'placeholder' => '- Select Floor -',
                ]) !!}
            </div>

            <!-- Category -->
            <div class="form-group row">
                {!! Form::select('category_id',
                    Category::pluck('name', 'id'), null, [
                        'class' => 'form-control',
                        'placeholder' => '- Select Category -',
                ]) !!}
            </div>

            <!-- Submit Button -->
            <div class="form-group row">
                <div class="col-sm-offset-3 col-sm-6">
                    {!! Form::button('Save', [
                        'type'  => 'submit',
                        'class' => 'btn btn-primary',
                    ]) !!}
                </div>
            </div>
        {!! Form::close() !!}
     </div>


@endsection
