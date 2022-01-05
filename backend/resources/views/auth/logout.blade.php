@extends('layouts.app')

@section('content')
<div class="container-fluid pt-5">
    <div class="row">
        <div class="col-sm-12 mt-5 mb-4">
            <h3 class="text-light">ログアウトしますか？</h3>
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button type="submit" name="logout" id="logout" class="btn btn-outline-light btn-lg mt-4">ログアウト</button>
            </form>
        </div>
    </div>
</div>
@endsection