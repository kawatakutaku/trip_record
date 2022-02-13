<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-100 leading-tight">
            {{-- TODO: Dashboardのように言語ファイルを使用する --}}
            好きな都市を選択してください
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route("cities.post") }}" method="post">
                @csrf
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                        <div class="inline-block relative w-64">
                            <select name="name" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                                @foreach ($prefectures as $prefecture)
                                    <option value="{{$prefecture->id}}">{{$prefecture->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <x-button>
                    <i class="fas fa-2x fa-check"></i>
                </x-button>
            </form>
        </div>
    </div>
</x-app-layout>