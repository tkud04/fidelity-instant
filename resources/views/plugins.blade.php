<?php
$void = 'javascript:void(0)';
?>
@extends('layout')

@section('title',"Plugins")


@section('content')
<section class="block" class="up">
<div class="container">
      <div class="row">
        @include('_admin-nav')

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4"><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
          @include('_admin-header',['title' => "Plugins",'btn' => "<a href='add-plugin' class='btn btn-primary'>Add New Plugin</a>"])
         
          <div class="table-responsive">
            <table class="table table-striped table-sm data-table">
              <thead>
                <tr>
                 <th>Name</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                  <?php
                   foreach($plugins as $p)
                   {
                     $tu = url('plugin')."?xf=".$p['id'];
                     $ru = url('remove-plugin')."?xf=".$p['id'];
                  ?>
                <tr>
                  <td>{{$p['name']}}</td>
                  
                  <td><span class="badge bg-info">{{strtoupper($p['status'])}}</span></td>
                  <td>
                    <div class="btn-group up">
                      <a href="{{$tu}}" class="btn btn-primary">View</a>
                      <a href="{{$ru}}" class="btn btn-danger">Remove</a>
                   </div>  
                  </td>
                </tr>
                <?php
                   }
                ?>
              </tbody>
            </table>
          </div>
        </main>
      </div>
    </div>
</section>
@stop