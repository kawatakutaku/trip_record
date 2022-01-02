@extends('Layout')

@section('container')
    <div class="container-fluid p-3">
        <div class="row justify-content-center mt-4">
            <div class="col-12 mt-5 col-md-4 col-xl-2 col-12">
                <h1 class="text-light">Welcome!</h1>
                <form action="/account_login" method="POST">
                    @csrf
                    {{-- {% bootstrap_form form layout="inline" %} --}}
                    <button type="submit" class="btn btn-success btn-block">ログイン</button>
                </form>
                <a name="signUp" id="signUp" class="btn btn-success btn-block mt-4" href="/account_signup" role="button">新規登録</a>
            </div>
        </div>
    </div>
@endsection