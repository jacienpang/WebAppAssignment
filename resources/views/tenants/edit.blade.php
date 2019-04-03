<?php
use App\Zone;
use App\Floor;
use App\Category;
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
      <div class="card-header">Edit Floor</div>
      <div class = "card-body">


        <!-- Upload Form -->
        {!! Form::open([
          'route' => ['tenant.saveUpload', $tenant->id],
          'class' => 'form-horizontal',
          'enctype' => 'multipart/form-data',
          'id' => 'FormPhoto'
          ]) !!}
          <div class="text-center" style="margin: 20px 20px 20px 20px">
            @if(Storage::disk('public')->exists('tenant/'.$tenant->id.'.jpg'))
              <img src="/storage/tenant/{{$tenant->id}}.jpg"
            width="240" alt= "{{ $tenant->name }}">
            @else
              <img src="https://poewellnesssolutions.com/wp-content/plugins/lightbox/images/No-image-found.jpg" width="240">
            @endif
          </div>
          <!-- Upload Picture -->
          <div class="col-md-10 form-group row text-md-right">
            {!! Form::label('tenant-photo', 'Select File', [
            'class' => 'control-label col-sm-4',
            ]) !!}
              <div class="col-sm-8">
                {!! Form::file('image', [
                'id' => 'tenant-photo-file',
                'class' => 'form-control',
                ]) !!}
              </div>
          </div>

          <div class="form-group row">
              <div class="col-sm-offset-3 col-sm-7">
                {!! Form::button('Update Photo', [
                    'type'  => 'submit',
                    'class' => 'btn btn-primary offset-md-8',

                ]) !!}
            </div>
          </div>
          {!! Form::close() !!}
          <!-- New Tenant Form -->
          {!! Form::model($tenant, [
              'route'   => ['tenant.update', $tenant->id],
              'method'  => 'put',
              'class'   => 'form-horizontal',
              'id' => 'FormTenant'
          ]) !!}
            <!-- Name -->
            <div class="col-md-10 form-group row text-md-right">
                {!! Form::label('tenant-shop_name', 'Shop Name', [
                    'class' => 'control-label col-sm-4',
                ]) !!}
                <div class="col-sm-8">
                    {!! Form::text('shop_name', $tenant->shop_name, [
                        'id'        => 'tenant-shop_name',
                        'class'     => 'form-control',
                        'maxlength' => 100,
                    ]) !!}
                </div>
            </div>

            <!-- Lot Number -->
            <div class="col-md-10 form-group row text-md-right">
                {!! Form::label('tenant-lot_number', 'Lot Number', [
                    'class' => 'control-label col-sm-4',
                ]) !!}
                <div class="col-sm-8">
                    {!! Form::text('lot_number', $tenant->lot_number, [
                        'id'        => 'tenant-lot_number',
                        'class'     => 'form-control',
                        'maxlength' => 10,
                    ]) !!}
                </div>
            </div>

            <!-- Zone -->
            <div class="col-md-10 form-group row text-md-right">
                {!! Form::label('tenant-zone', 'Zone', [
                    'class' => 'control-label col-sm-4',
                ]) !!}
            <div class="col-sm-8">
                {!! Form::select('zone_id',
                    Zone::pluck('code', 'id'), $tenant->zone_id, [
                        'class' => 'form-control col-sm-12',
                        'placeholder' => '- Select Zone -',
                ]) !!}
            </div>
            </div>

            <!-- Floor -->
            <div class="col-md-10 form-group row text-md-right">
                {!! Form::label('tenant-floor', 'Floor', [
                    'class' => 'control-label col-sm-4',
                ]) !!}
              <div class="col-sm-8">
                {!! Form::select('floor_id',
                    Floor::pluck('code', 'id'), $tenant->floor_id, [
                        'class' => 'form-control col-sm-12',
                        'placeholder' => '- Select Floor -',
                ]) !!}
            </div>
          </div>

            <!-- Category -->
            <div class="col-md-10 form-group row text-md-right">
                {!! Form::label('tenant-category', 'Category', [
                    'class' => 'control-label col-sm-4',
                ]) !!}
              <div class="col-sm-8">
                {!! Form::select('category_id',
                    Category::pluck('name', 'id'), $tenant->category_id, [
                        'class' => 'form-control col-sm-12',
                        'placeholder' => '- Select Category -',
                ]) !!}
            </div>
            </div>


            <!-- Owner Name -->
            <div class="col-md-10 form-group row text-md-right">
                {!! Form::label('tenant-owner_name', 'Owner Name', [
                    'class' => 'control-label col-sm-4',
                ]) !!}
                <div class="col-sm-8">
                    {!! Form::text('owner_name', $tenant->owner_name, [
                        'id'        => 'tenant-owner_name',
                        'class'     => 'form-control',
                        'maxlength' => 100,
                    ]) !!}
                </div>
            </div>

            <!-- Email -->
            <div class="col-md-10 form-group row text-md-right">
                {!! Form::label('tenant-email', 'Email', [
                    'class' => 'control-label col-sm-4',
                ]) !!}
                <div class="col-sm-8">
                    {!! Form::text('email',  $tenant->email, [
                        'id'        => 'tenant-email',
                        'class'     => 'form-control',
                        'maxlength' => 100,
                    ]) !!}
                </div>
            </div>

            <!-- Phone -->
            <div class="col-md-10 form-group row text-md-right">
                {!! Form::label('tenant-phone', 'Contact Number', [
                    'class' => 'control-label col-sm-4',
                ]) !!}
                <div class="col-sm-8">
                    {!! Form::text('phone',  $tenant->phone, [
                        'id'        => 'tenant-phone',
                        'class'     => 'form-control',
                        'maxlength' => 15,
                    ]) !!}
                </div>
            </div>

            <!-- Submit Button -->
            <div class="form-group row">
                <div class="col-sm-offset-3 col-sm-6">
                    {!! Form::button('Update', [
                        'type'  => 'submit',
                        'class' => 'btn btn-primary offset-md-8',
                        'onClick' => 'submitForms()'
                    ]) !!}
                </div>
            </div>

        {!! Form::close() !!}
     </div>
</div>
</div>
</div>
</div>

@endsection
