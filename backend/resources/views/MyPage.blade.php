<!doctype html>
@extends('Layout')
@section('container')
{{-- TODO bladeの中でif文を使う方法を採用する --}}
@if ($trip_content_future !== null && $trip_content_before !== null)
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
                    <h2 class="text-secondary">次の旅行</h2>
                    @if ($trip_content_future)
                        <div class="row justify-content-center">
                            @foreach ($trip_content_future as $content)
                                <div class="col-sm-4 col-md-4 m-3">
                                    <a class="btn btn-light pt-4 pb-4" href="{% url 'make_trip:trip' content.id %}" role="button">
                                        {{ $content->$trip_name }} <br>
                                        {{ $content->$start }} 〜 {{ $content->$end }}
                                    </a>
                                    <div class="row justify-content-end">
                                        <div class="col-sm-7 col-md-7 col-7 col-xl-4">
                                            <a class="text-success" href="{% url 'make_trip:trip' content.id %}"><i class="fa fa-edit"></i></a>
                                            <a class="ml-4 text-success" href="{% url 'make_trip:delete' content.id %}"><i class="fas fa-trash-alt"></i></a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
                <h2 class="text-secondary">これまでの旅行</h2>
                @if ($trip_content_before)
                    <div class="row justify-content-center">
                        @foreach ($trip_content_before as $content)
                        <div class="col-sm-4 col-md-4 m-3">
                            <a class="btn btn-light pt-4 pb-4" href="{% url 'make_trip:trip' content.id %}" role="button">
                                {{ $content->$trip_name }} <br>
                                {{ $content->$start }} 〜 {{ $content->$end }}
                            </a>
                            <div class="row justify-content-end">
                                <div class="col-sm-7 col-md-7 col-7 col-xl-4">
                                    <a class="text-success" href="{% url 'make_trip:trip' content.id %}"><i class="fa fa-edit"></i></a>
                                    <a class="ml-4 text-success" href="{% url 'make_trip:delete' content.id %}"><i class="fas fa-trash-alt"></i></a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
@endif
@endsection