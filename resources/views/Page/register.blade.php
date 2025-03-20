@extends('master')
@section('content')
    <h2>Đăng ký</h2>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{ route('registerHandle') }}">
        @csrf
        <input type="text" name="name" placeholder="Tên">
        <br>
        <input type="email" name="email" placeholder="Email">
        <br>
        <input type="password" name="password" placeholder="Mật khẩu">
        <br>
        <input type="password" name="password_confirmation" placeholder="Xác nhận mật khẩu">
        <br>
        <button type="submit">Đăng ký</button>
    </form>
@endsection
