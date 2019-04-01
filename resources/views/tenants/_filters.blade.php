<?php

 use App\Zone;
 use App\Floor;
 use App\Category;
 ?>
 <section class="filters">
 {!! Form::open([
 'route' => ['tenant.index'],
 'method' => 'get',
 'class' => 'form-inline'
 ]) !!}
 {!! Form::label('tenant-name', 'Tenant Name', [
 'class' => 'control-label col-sm-3',
 ]) !!}
 {!! Form::text('name', null, [
     'id'        => 'tenant-name',
     'class'     => 'form-control',
     'maxlength' => 100,
 ]) !!}

 {!! Form::label('tenant-lot_number', 'Lot Number', [
     'class' => 'control-label col-sm-3',
 ]) !!}
 {!! Form::text('lot_number', null, [
     'id'        => 'tenant-lot_number',
     'class'     => 'form-control',
     'maxlength' => 10,
 ]) !!}

 {!! Form::label('tenant-zone_id', 'Zone', [
 'class' => 'control-label col-sm-3',
 ]) !!}
 {!! Form::select('zone_id',
     Zone::pluck('code', 'id'), null, [
         'class' => 'form-control',
         'placeholder' => '- All -',
 ]) !!}

 {!! Form::label('tenant-floor_id', 'Floor', [
 'class' => 'control-label col-sm-3',
 ]) !!}
 {!! Form::select('floor_id',
     Floor::pluck('code', 'id'), null, [
         'class' => 'form-control',
         'placeholder' => '- All -',
 ]) !!}

 {!! Form::label('tenant-category_id', 'Category', [
 'class' => 'control-label col-sm-3',
 ]) !!}
 {!! Form::select('category_id',
     Category::pluck('name', 'id'), null, [
         'class' => 'form-control',
         'placeholder' => '- All -',
 ]) !!}

 {!! Form::button('Filter', [
 'type' => 'submit',
 'class' => 'btn btn-primary',
 ]) !!}

 {!! Form::close() !!}
 </div>
 </section>
