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
                    <h2 class="text-gray-800 py-4">次の旅行</h2>
                    @foreach($trips as $trip)
                    <a class="bg-blue-500" href="{{ route('trips.show', ['trip' => $trip->id]) }}" role="button">
                        {{ $trip->trip_name }} <br>
                        {{ $trip->start_day }} 〜 {{ $trip->end_day }}
                    </a>
                    <form action="{{ route('trips.destroy', ['trip' => $trip->id]) }}" method="POST">
                        <a class="text-black" href="{{ route('trips.edit', ['trip' => $trip->id]) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                        </a>
                        @csrf
                        @method('delete')
                        <!-- TODO 削除ボタンを編集ボタンと横並びにさせる-->
                        <button type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </button>
                    </form>
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
</x-app-layout>