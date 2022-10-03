<?php
$void = 'javascript:void(0)';
$shipper = $t['shipper'];
$receiver = $t['receiver'];

$tu = url('tracking-history')."?tnum=".$t['tnum'];
?>
@extends('layout')

@section('title',"Edit Tracking")


@section('content')
<section class="block">
<div class="container">
      <div class="row">
        @include('_admin-nav')

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4"><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
          @include('_admin-header',['title' => "Edit Tracking #".$t['tnum'],'btn' => " <a href='$tu'>View Tracking History</a>"])
         
         <form id="add-tracking-form" action="{{url('tracking')}}" method="post">
           {!! csrf_field() !!}
           <input type="hidden" name="tnum" value="{{$t['tnum']}}"/>
           
           <div class="row">
              <div class="mb-3 form-group col-md-12">
               <h2 class="">Shipper Information</h2>
			   </div>
               <div class="form-group col-md-6">
                 <label class="control-label">Name</label>
                 <input type="text" class="form-control" id="sname" name="sname" placeholder="Shipper name" value="{{$shipper['name']}}">
               </div>
               <div class="form-group col-md-6">
                 <label class="control-label">Phone number</label>
                 <input type="text" class="form-control" id="sphone" name="sphone" placeholder="Shipper phone number" value="{{$shipper['phone']}}">
               </div>
               <div class="form-group col-md-12 mt-3">
                 <label class="control-label">Address</label>
                 <input type="text" class="form-control" id="sadd" name="sadd" placeholder="Shipper address" value="{{$shipper['address']}}">
               </div>
           </div>

           <div class="row mt-5">
              <div class="mb-3 form-group col-md-12">
               <h2 class="">Receiver Information</h2>
			   </div>
               <div class="form-group col-md-6">
                 <label class="control-label">Name</label>
                 <input type="text" class="form-control" id="rname" name="rname" placeholder="Receiver name" value="{{$receiver['name']}}">
               </div>
               <div class="form-group col-md-6">
                 <label class="control-label">Phone number</label>
                 <input type="text" class="form-control" id="rphone" name="rphone" placeholder="Receiver phone number" value="{{$receiver['phone']}}">
               </div>
               <div class="form-group col-md-12 mt-3">
                 <label class="control-label">Address</label>
                 <input type="text" class="form-control" id="radd" name="radd" placeholder="Receiver address" value="{{$receiver['address']}}">
               </div>
           </div>


           <div class="row mt-5">
              <div class="mb-3 form-group col-md-12">
               <h2 class="">Shipping Information</h2>
			   </div>
               <div class="form-group col-md-6">
                 <label class="control-label">Ship Type</label>
                 <input type="text" class="form-control" id="stype" name="stype" placeholder="Ship type" value="{{$t['stype']}}">
               </div>
               <div class="form-group col-md-6">
                 <label class="control-label">Weight (kg)</label>
                 <input type="text" class="form-control" id="weight" name="weight" placeholder="Weight (kg)" value="{{$t['weight']}}">
               </div>
               <div class="form-group col-md-6 mt-3">
                 <label class="control-label">Origin Office</label>
                 <input type="text" class="form-control" id="origin" name="origin" placeholder="Origin office" value="{{$t['origin']}}">
               </div>
               <div class="form-group col-md-6 mt-3">
                 <label class="control-label">Destination Office</label>
                 <input type="text" class="form-control" id="dest" name="dest" placeholder="Destination office" value="{{$t['dest']}}">
               </div>
               <div class="form-group col-md-12 mt-3">
                 <label class="control-label">Description</label>
                 <textarea class="form-control" id="description" name="description" placeholder="Description" rows="15">{!! $t['description'] !!}</textarea>
               </div>
               <div class="form-group col-md-6 mt-3">
                 <label class="control-label">Freight ($)</label>
                 <input type="text" class="form-control" id="freight" name="freight" placeholder="Freight ($)" value="{{$t['freight']}}">
               </div>
               <div class="form-group col-md-6 mt-3">
                 <label class="control-label">Booking mode</label>
                 <?php
				    $bmodes = ['none' => "Select booking mode", 'paid' => "Paid", 'unpaid' => "Unpaid"];
				  ?>
                 <select class="form-control" id="bmode" name="bmode">
                     <?php
                      foreach($bmodes as $key => $value)
                      {
                          $ss = $key == $t['bmode'] ? " selected" : "";
                     ?>
                      <option value="{{$key}}"{{$ss}}>{{$value}}</option>
                    <?php
                      }
                    ?>
                 </select>
               </div>
               <div class="form-group col-md-6 mt-3">
                 <label class="control-label">Mode</label>
                 <input type="text" class="form-control" id="mode" name="mode" placeholder="Mode" value="{{$t['mode']}}">
               </div>
               <div class="form-group col-md-6 mt-3">
                 <label class="control-label">Tracking Status</label>
                 <?php
				    $statuses = ['none' => "Select status", 'station' => "ARRIVED AT STATION", 'hold' => "ON HOLD", 'transit' => "IN TRANSIT", 'delivery' => "OUT FOR DELIVERY", 'delivered' => "DELIVERED"];
				  ?>
                 <select class="form-control" id="tracking-status" name="status">
                     <?php
                      foreach($statuses as $key => $value)
                      {
                          $ss = $key == $t['status'] ? " selected" : "";
                     ?>
                      <option value="{{$key}}"{{$ss}}>{{$value}}</option>
                    <?php
                      }
                    ?>
                 </select>
               </div>
               <div class="form-group col-md-12 mt-3">
                 <label class="control-label">Pickup Date</label>
                 <input type="text" class="form-control" id="pickup-at" name="pickup_at" placeholder="Pickup date (dd/mm/YYYY)" value="{{$t['pickup_at']}}">
               </div>

               <div class="form-group col-md-12 mt-3">
                 <button class="btn btn-primary" id="add-tracking-submit">SUBMIT</button>
               </div>
           </div>

           
         </form>
        </main>
      </div>
    </div>
</section>
@stop