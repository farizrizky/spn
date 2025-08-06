@extends('cms.template.auth')
@section('content')
<div class="card card-round">
    
    <div class="card-body">
      <form method="POST" action="{{ route('cms.login') }}" class="needs-validation" novalidate>
        @csrf
        <div class="form-group">
            <label for="username">Email</label>
            <input type="email" class="form-control" id="username" name="email" placeholder="Email" required>
             @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            <div class="invalid-feedback">
                Email harus diisi.
            </div>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
             @error('password')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            <div class="invalid-feedback">
                Password harus diisi.
            </div>
        </div>
    </div>
    <div class="card-action d-grid">
        <button class="btn btn-primary" name="submit">Login</button>
        <a href="#" class="">Lupa Password?</a>
    </div>
    </form>
</div>
@endsection