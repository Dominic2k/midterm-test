@extends('master')

@section('content')
<h2>Đăng nhập</h2>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('login') }}">
    @csrf

    <div>
        <input type="email" name="email" placeholder="Email" value="{{ old('email') }}">
        @error('email')
        <p style="color: red;">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <input type="password" name="password" placeholder="Mật khẩu">
        @error('password')
        <p style="color: red;">{{ $message }}</p>
        @enderror
    </div>

    <button type="submit">Đăng nhập</button>
</form>

@endsection
