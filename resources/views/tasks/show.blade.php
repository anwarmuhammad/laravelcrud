@extends('layouts.app')
@section('content')
@if (Session::has('message'))
<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
<h1>Showing Task {{ $task->title }}</h1>
<div class="jumbotron text-center">
<p>
<strong>Task Title:</strong> {{ $task->title }}<br>
<strong>Description:</strong> {{ $task->description }}
</p>
</div>
@endsection
