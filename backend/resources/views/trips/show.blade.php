<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <!-- TODO Dashboardのように言語ファイルを使用する-->
            詳細画面
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @csrf
                    <!-- TODO タイトル 値みたいな表示の方法を採用する   -->
                    <p name="trip_name" id="trip_name" class="text-black pb-5">{{ $trip->trip_name }}</p>
                    <p name="start_day" id="start_day" class="text-black pb-5">{{ $trip->start_day }}</p>
                    <p name="end_day" id="end_day" class="text-black pb-5">{{ $trip->end_day }}</p>
                    <a name="trips_edit" id="trips_edit" href="{{ route("trips.edit", ["trip" => $trip->id]) }}" role="button">変更する</a>
                    <form action="{{ route('trips.destroy', $trip->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="py-4">削除する</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>