<?php

use App\Common;
?>
@extends('layouts.appAdmin')

@section('content')
<div class="container">
  <div class="row justify-content-md-center mt-5 mb-5">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          <h3>{{ $tenant->shop_name }}<h3>
        </div>
          @if(Storage::disk('public')->exists('tenant/'.$tenant->id.'.jpg'))
          <img class="card-img-top" src="/storage/tenant/{{$tenant->id}}.jpg"
            alt= "{{ $tenant->name }}">
          @else
          <img src="https://poewellnesssolutions.com/wp-content/plugins/lightbox/images/No-image-found.jpg" width="240">
          @endif


          <div class="panel-body">
            <table class="table table-striped task-table">

              <!-- Table Body -->
              <tbody>
                <tr>
                  <td>Name</td>
                  <td>{{ $tenant->shop_name }}</td>
                </tr>
                <tr>
                  <td>Location</td>
                  <td>{{ $tenant->floor->code."-".$tenant->zone->code."-".$tenant->lot_number }}</td>
                </tr>
                <tr>
                  <td>Category</td>
                  <td>{{ $tenant->category->name }}</td>
                </tr>

                <tr>
                  <td>Email</td>
                  <td>{{ $tenant->email }}</td>
                </tr>
                <tr>
                  <td>Contact</td>
                  <td>{{ $tenant->phone }}</td>
                </tr>

              </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection
