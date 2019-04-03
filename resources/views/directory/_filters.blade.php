<?php
use App\Zone;
use App\Floor;
use App\Category;
?>
<section class="filters">
    <div clas = "container-fluid">
       {!! Form::open([
           'route' => ['directory.index'],
           'method' => 'get',
           'class' => 'form-inline'
       ]) !!}
       <table class="table table-borderless">
           <thead>
               <th class= "text-center" scope="col"><strong>ZONE<strong></th>
               <th class= "text-center" scope="col"><strong>FLOOR<strong></th>
               <th class= "text-center" scope="col"><strong>CATEGORY<strong></th>
           </thead>
           <tbody>
              <tr>
                  <td class= "text-center">
                      {!! Form::select('zone_id',
                          Zone::pluck('code', 'id'), null, [
                              'class' => 'form-control',
                              'placeholder' => '- All -',
                              'onchange' => 'this.form.submit()'
                      ]) !!}
                  </td>
                  <td class= "text-center">
                      {!! Form::select('floor_id',
                          Floor::pluck('code', 'id'), null, [
                              'class' => 'form-control',
                              'placeholder' => '- All -',
                              'onchange' => 'this.form.submit()'
                      ]) !!}
                  </td>
                  <td class= "text-center">
                      {!! Form::select('category_id',
                          Category::pluck('name', 'id'), null, [
                              'class' => 'form-control',
                              'placeholder' => '- All -',
                              'onchange' => 'this.form.submit()'
                      ]) !!}
                  </td>
              </tr>
           </tbody>
       {!! Form::close() !!}
    </div>
</section>
