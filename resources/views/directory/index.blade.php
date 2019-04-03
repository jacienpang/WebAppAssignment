<?php
use App\Zone;
use App\Floor;
use App\Category;
 ?>


@extends('layouts.app')

@section('content')
<table class="table table-borderless">
    <thead>
      <td>@include('directory._filters')</td>
    </thead>
    <tbody>
      <tr>
        <td colspan="5">
            @if (count($tenants) > 0)
            <div class="card-columns" style="margin: 20px 20px 20px 20px">
                @foreach ($tenants as $i => $tenant)

                    <a href= "directory/{{ $tenant->id }}" class="custom-card-link">
                        <div class="card shadow">
                            @if(Storage::disk('public')->exists('tenant/'.$tenant->id.'.jpg'))
                            <img class="card-img-top" src="/storage/tenant/{{$tenant->id}}.jpg"
                              alt= "{{ $tenant->name }}">
                            @else
                            <img src="https://poewellnesssolutions.com/wp-content/plugins/lightbox/images/No-image-found.jpg" width="240">
                            @endif

                            <div class="card-body">
                                <h5 class="card-title"> {{ $tenant->shop_name }} </h5>
                                <h6 class="card-subtitle mb-2 text-muted"> {{ $tenant->floor->code."-".$tenant->zone->code."-".$tenant->lot_number }}</h6>
                                <p class="card-text"> {{ $tenant->category->name }} </p>
                            </div>

                        </div>
                    </a>
                @endforeach
            </div>
            @else
              <div>
                <div class="container">
                  <div class="row justify-content-md-center mt-5">
                    <div class="col-md-8">
                      <div class="card">
                        <div class="card-body">
                          <div class="text-center">
                            There is no record found for directory.
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            @endif
        </td>
      </tr>
    </tbody>
</table>

@endsection
