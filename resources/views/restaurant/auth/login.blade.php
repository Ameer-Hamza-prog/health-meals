@extends('layouts.guest')

@section('content')
    <form method="POST" action="{{ route('restaurant.login') }}">
        @csrf

        <div class="mb-3">
            <label class="form-label">Restaurant Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary w-100">Restaurant Login</button>
        
        <div class="mt-4 text-center">
            <p class="mb-0">Not a restaurant? 
                <a href="{{ route('login') }}">User login here</a>
            </p>
        </div>
    </form>
@endsection
