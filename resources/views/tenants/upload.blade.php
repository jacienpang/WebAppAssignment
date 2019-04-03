
@extends('layouts.appAdmin')

 @section('content')

  <!-- Bootstrap Boilerplate... -->

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
      <div class="card-header">Upload Tenant Photo</div>
      <div class="card-body">
        <!-- Upload Form -->
        {!! Form::open([
          'route' => ['tenant.saveUpload', $tenant->id],
          'class' => 'form-horizontal',
          'enctype' => 'multipart/form-data',

          ]) !!}
          <div class="text-center" style="margin: 20px 20px 20px 20px">
            @if(Storage::disk('public')->exists('tenant/'.$tenant->id.'.jpg'))
              <img src="/storage/tenant/{{$tenant->id}}.jpg"
              width="240" alt= "{{ $tenant->name }}">
            @else
              <img src="https://poewellnesssolutions.com/wp-content/plugins/lightbox/images/No-image-found.jpg" width="240">
            @endif
          </div>
          <!-- Code -->
          <div class="col-md-12 form-group row text-md-right">
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

          <!-- Submit Button -->
          <div class="form-group row">
          <div class="col-sm-offset-3 col-sm-6">
              {!! Form::button('Upload', [
              'type' => 'submit',
              'class' => 'btn btn-primary offset-md-8',
              ]) !!}
            </div>
          </div>
          {!! Form::close() !!}
        </div>
      </div>
    </div>
</div>

 @endsection
