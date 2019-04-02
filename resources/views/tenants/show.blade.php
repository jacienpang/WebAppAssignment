<?php

use App\Common;
?>
@extends('layouts.app')

@section('content')

  <!-- Bootstrap Boilerplate... -->
  @if(Storage::disk('public')->exists('tenant/'.$tenant->id.'.jpg'))
  <img src="/storage/tenant/{{$tenant->id}}.jpg"
  width="240" alt= {{ $tenant->name}}>
  @else
  <img src="http://www.totalbattery.com/wp-content/uploads/2017/04/Under_construction-300x300.png"
  width="240">
  @endif

  <div class="panel-body">
    <table class="table table-striped task-table">
      <!-- Table Headings -->
      <thead>
        <tr>
          <th>Attribute</th>
          <th>Value</th>
        </tr>
      </thead>
      <!-- Table Body -->
      <tbody>
        <tr>
  <td>Name</td>
  <td>{{ $tenant->name }}</td>
  </tr>
  <tr>
    <td>Placement</td>
    <td>{{ $tenant->floor->code."-".$tenant->zone->code."-".$tenant->lot_number }}</td>
  </tr>
  <tr>
    <td>Category</td>
    <td>{{ $tenant->category->name }}</td>
  </tr>
  <tr>
    <td>Created</td>
    <td>{{ $tenant->created_at }}</td>
  </tr>
  </tbody>
  </table>
  </div>


@endsection
