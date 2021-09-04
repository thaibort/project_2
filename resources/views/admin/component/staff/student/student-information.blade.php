@extends('admin.layout.master')
@foreach($rs as $res)
    @section('title',$res->studentName)
@endforeach
