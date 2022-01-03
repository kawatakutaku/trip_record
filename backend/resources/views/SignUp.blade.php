<!doctype html>
@extends('Layout')

@section('container')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 mt-5 mb-3 mx-auto">
            <h3 class="text-secondary">新規登録</h3>
        </div>
    </div>
    <form action="/account_signup" method="POST">
        <div class="row d-flex justify-content-center">
            <div class="col-8 col-xl-6 col-md-8 col-sm-4 col-xs-12">
                <div class="row mb-4">
                    <div class="col-12">
                        @csrf
                        {{-- TODO bootstrap_formとは何かを特定する --}}
                        {{-- {% bootstrap_form form layout='horizontal' %} --}}
                    </div>
                </div>
                <button type="submit" class="btn btn-success btn-block">登録</button>
            </div>
        </div>
    </form>
</div>
@endsection