<!doctype html>
@extends('layouts.app')
@section('content')
{{-- TODO bladeの中でif文を使う方法を採用する --}}
@if ($trips === null)
    <div class="container-fluid pt-5">
        <div class="row justify-content-center d-flex mt-5">
            <div class="col-md-8 col-xl-6">
                <h3 class="text-secondary">さあ、旅行に行こう!</h3>
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
                                <!-- TODO editやshowのtrip_idのキーをtrip_idに変更する-->
                                <a class="btn btn-light pt-4 pb-4" href="{{ route('trips.show', ['trip' => $trip->id]) }}" role="button">
                                    {{ $trip->trip_name }} <br>
                                    {{ $trip->start_day }} 〜 {{ $trip->end_day }}
                                </a>
                                <div class="row justify-content-end">
                                    <div class="col-sm-7 col-md-7 col-7 col-xl-4">
                                        <!-- TODO editやshowのtrip_idのキーをtrip_idに変更する-->
                                        <form action="{{ route('trips.destroy', ['trip' => $trip->id]) }}" method="POST">
                                        <a class="text-success" href="{{ route('trips.edit', ['trip' => $trip->id]) }}"><i class="fa fa-edit"></i></a>
                                            @csrf
                                            @method('delete')
                                            <!-- TODO 削除ボタンを編集ボタンと統一させる-->
                                            <button type="submit" class="btn btn-outline-primary" style="border: none;"><i class="fas fa-trash-alt"></i></button>
                                        </form>
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