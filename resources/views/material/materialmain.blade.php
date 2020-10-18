<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="{{ asset('css/style.css')}}" >
    
</head>
<body>
@extends('layouts.app')
@section('sidebar')
@parent
    <h1>Material</h1>
    <ul>
        <li>wheel</li>
        <li>light</li>
    </ul>
@endsection
</body>
</html>