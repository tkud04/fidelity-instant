<?php
$void = 'javascript:void(0)';
?>
@extends('layout')

@section('title',"Tracking")

@section('content')
<?php
if($valid)
{
?>
 @include('tracking-found',['result' => $result])
<?php
}

else{
?>
  @include('tracking-not-found')
<?php
}
?>
@stop