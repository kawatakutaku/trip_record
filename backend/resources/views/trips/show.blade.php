<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- TODO 以下を、bootstrapを使って記述をしているからtailwindに合わせる-->
                    @csrf
                    <div class="row p-2 justify-content-center">
                        <div class="col-6">
                            <!-- TODO タイトル 値みたいな表示の方法を採用する   -->
                            <p name="trip_name" id="trip_name" class="text-light">{{ $trip->trip_name }}</p>
                        </div>
                    </div>
                    <div class="row p-2 mt-3 justify-content-center">
                        <div class="col-6" id="start">
                            <p name="start_day" id="start_day" class="text-light">{{ $trip->start_day }}</p>
                        </div>
                    </div>
                    <div class="row p-2 mt-3 justify-content-center">
                        <div class="col-6" id="end">
                            <p name="end_day" id="end_day" class="text-light">{{ $trip->end_day }}</p>
                        </div>
                    </div>
                    <a name="trips_edit" id="trips_edit" class="btn btn-outline-light" href="{{ route("trips.edit", ["trip" => $trip->id]) }}" role="button">変更する</a>
                    <form action="{{ route('trips.destroy', $trip->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-outline-light mt-4">削除する</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>