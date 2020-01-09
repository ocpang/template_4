@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p>Welcome to this beautiful admin panel.</p>

    @role('adminnadyne')
        I'm an adminnadyne!
    @else
        @role('clientadmin')
            I'm a clientadmin!
        @else
            @role('clientsms')
                I'm a clientsms!
            @else
                I'm not a clientsms...
            @endrole
        @endrole
    @endrole

    <br/>
    <br/>
    
    @can('list')
        I have permission to list
    @endcan
    <br/>
    
    @can('create')
        I have permission to create
    @endcan
    <br/>
    
    @can('edit')
        I have permission to edit
    @endcan
    <br/>
    
    @can('delete')
        I have permission to delete
    @endcan
    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop