@extends('layout')
        @section('title')
            welcome
        @endsection
        @section('content')
        
        <h1>home page</h1>
        <a href="/try">go to {{ $linkpage  }}</a>
        
        @foreach($array as $arr)
            <li>{{$arr}}</li>
        @endforeach
    
        @endsection
    