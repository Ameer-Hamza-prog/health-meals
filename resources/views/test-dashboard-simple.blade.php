@extends('layouts.admindashboard')

@section('content')
<div class="container">
    <h1>TEST Dashboard</h1>
    <p>If this works, your dashboard content has issues.</p>
    <p>User: {{ Auth::user()->email }}</p>
</div>
@endsection
