<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <!-- TODO Dashboardの言語ファイルを使用しているから修正する-->
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    @if ($trips === null)
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    さあ、旅行に行こう!
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- TODO 以下を、bootstrapを使って記述をしているからtailwindに合わせる-->
                    <h2 class="text-light">次の旅行</h2>
                    <div class="row justify-content-center">
                        @foreach($trips as $trip)
                            <div class="col-sm-4 col-md-4 m-3">
                                <a class="btn btn-light pt-4 pb-4" href="{{ route('trips.show', ['trip' => $trip->id]) }}" role="button">
                                    {{ $trip->trip_name }} <br>
                                    {{ $trip->start_day }} 〜 {{ $trip->end_day }}
                                </a>
                                <div class="row justify-content-end">
                                    <div class="col-sm-7 col-md-7 col-7 col-xl-4">
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
</x-app-layout>