<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-100 leading-tight">
            {{ __('memo.show') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="row p-2 justify-content-center">
                        <div class="col-6">
                            <p class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="memo" id="memo">{{ $memo->memo }}</p>
                        </div>
                    </div>
                    <div class="row p-2 mt-3 justify-content-center">
                        <div class="col-6" id="img">
                            <p class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="img" id="img">{{ $memo->img }}</p>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-xl-3 col-xs-12 mx-auto mt-5">
                        <x-linkbutton href="{{ route('memos.edit', [App\Models\Memo::MEMO_ID_NAME => $memo->id, App\Models\City::CITY_ID_NAME => $cityId]) }}">
                            <i class="fas fa-lg fa-edit"></i>
                        </x-linkbutton>
                        <!-- TODO: componentの中にformタグ自体も書けるようにしたい -->
                        <form action="{{ route("memos.destroy", [App\Models\Memo::MEMO_ID_NAME => $memo->id, App\Models\City::CITY_ID_NAME => $cityId]) }}" method="post">
                            <x-delete/>
                        </form>
                        <form action="{{ route("memos.like", [App\Models\Memo::MEMO_ID_NAME => $memo->id]) }}" method="post">
                            @csrf
                            <x-button>
                                いいね
                                <span class="badge">
                                    {{ $memo->MemoLikes->count() }}
                                </span>
                            </x-button>
                        </form>
                        <x-linkbutton href="{{ route('responses.create', [App\Models\MemoResponse::MEMO_DB_ID => $memo->id]) }}">
                            <i class="fas fa-lg fa-reply"></i>
                        </x-linkbutton>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>