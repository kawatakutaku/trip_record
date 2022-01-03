<!doctype html>
@extends('Layout')
@section('container')
{{-- TODO bladeの中でif文を使う方法を採用する --}}
@if ($trips === null)
    <div class="container-fluid pt-5">
        <div class="row justify-content-center d-flex mt-5">
            <div class="col-md-8 col-xl-6">
                <h3 class="text-secondary">さあ、旅行に行こう！</h3>
            </div>
        </div>
    </div>
@else
    <div class="container-fluid">
        <div class="row justify-content-center mt-5 d-flex">
            <div class="col-md-8">
                <div class="border-bottom border-dark pb-5 mb-5">
                    <h2 class="text-light">次の旅行</h2>
                    <div class="row justify-content-center">
                        @foreach($trips as $trip)
                            <div class="col-sm-4 col-md-4 m-3">
                                <a class="btn btn-light pt-4 pb-4" href="/trip/{content.id}" role="button">
                                    {{ $trip->trip_name }} <br>
                                    {{ $trip->start_day }} 〜 {{ $trip->end_day }}
                                </a>
                                <div class="row justify-content-end">
                                    <div class="col-sm-7 col-md-7 col-7 col-xl-4">
                                        {{-- <a class="text-success" href="/trip/{content.id}"><i class="fa fa-edit"></i></a> --}}
                                        {{-- <a class="ml-4 text-success" href="/delete/{content.id}"><i class="fas fa-trash-alt"></i></a> --}}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
@endsection