<?php
$void = 'javascript:void(0)';
$statuses = ['none' => "Select status", 'station' => "ARRIVED AT STATION", 'hold' => "ON HOLD", 'transit' => "IN TRANSIT", 'delivery' => "OUT FOR DELIVERY", 'delivered' => "DELIVERED"];
?>
@extends('layout')

@section('title',"Trackings")


@section('content')
<section class="block">
<div class="container">
      <div class="row">
        @include('_admin-nav')

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4"><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
          @include('_admin-header',['title' => "Trackings",'btn' => "<a href='add-tracking' class='btn btn-primary'>Add New Tracking</a>"])
         
          <div class="table-responsive">
            <table class="table table-striped table-sm data-table">
              <thead>
                <tr>
                 <th>Transaction No.</th>
                  <th>Details</th>
                  <th>Shipper Information</th>
                  <th>Receiver Information</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                  <?php
                   foreach($trackings as $t)
                   {
                     $tu = url('tracking')."?xf=".$t['tnum'];
                     $ru = url('remove-tracking')."?xf=".$t['tnum'];
                     $shipper = $t['shipper'];
                     $receiver = $t['receiver'];
                  ?>
                <tr>
                  <td>{{$t['tnum']}}</td>
                  <td>
                    <ul class="no-dot">
                      <li>Ship Type: {{$t['stype']}}</li>
                      <li>Weight: {{$t['weight']}}kg</li>
                      <li>Origin office: {{$t['origin']}}</li>
                      <li>Destination office: {{$t['dest']}}</li>
                    </ul>
                   </td>
                  <td>
                    <ul class="no-dot">
                      <li>Name: {{$shipper['name']}}</li>
                      <li>Phone: {{$shipper['phone']}}</li>
                      <li>Address: {{$shipper['address']}}</li>
                    </ul>
                   </td>
                   <td>
                    <ul class="no-dot">
                      <li>Name: {{$receiver['name']}}</li>
                      <li>Phone: {{$receiver['phone']}}</li>
                      <li>Address: {{$receiver['address']}}</li>
                    </ul>
                  </td>
                  <td><span class="badge bg-info">{{$statuses[$t['status']]}}</span></td>
                  <td>
                    <div class="btn-group">
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