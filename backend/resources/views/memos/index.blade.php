<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-100 leading-tight">
            {{ __('memo.index') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- TODO: memos系のurlのときにnavにcreateも表示されるようにしたい --}}
            <x-linkbutton href="{{ route('memos.create', [App\Models\City::CITY_ID_NAME => $cityId]) }}">
                <i class="fas fa-lg fa-pen"></i>
            </x-linkbutton>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @foreach($memos as $memo)
                        @if ($user->id == $memo->user_id)
                            <div class="row p-2 justify-content-center">
                                <div class="col-6">
                                    <img src="{{ $user->img }}" alt="">
                                    <p class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="memo" id="memo">{{ $memo->memo }}</p>
                                    @if ($memo->img)
                                        <img src="{{ $memo->img }}" alt="">
                                    @endif
                                </div>
                                {{-- TODO: 詳細ボタンと削除ボタンを横並びにさせたい --}}
                                {{-- TODO: memos系のurlのときにnavにcreateも表示されるようにしたい --}}
                                <x-linkbutton href="{{ route('responses.create', [App\Models\MemoResponse::MEMO_ID => $memo->id]) }}">
                                    <i class="fas fa-lg fa-reply"></i>
                                </x-linkbutton>
                                <x-linkbutton href="{{ route('memos.edit', [App\Models\Memo::MEMO_ID_NAME => $memo->id]) }}">
                                    <i class="fas fa-lg fa-edit"></i>
                                </x-linkbutton>
                                <x-linkbutton href="{{ route('memos.show', [App\Models\Memo::MEMO_ID_NAME => $memo->id, App\Models\City::CITY_ID_NAME => $cityId]) }}">
                                    <i class="fas fa-lg fa-file-alt"></i>
                                </x-linkbutton>
                                <form action="{{ route("memos.like", [App\Models\Memo::MEMO_ID_NAME => $memo->id]) }}" method="post">
                                    @csrf
                                    <x-button>
                                        いいね
                                        <span class="badge">
                                            {{ $memo->MemoLikes->count() }}
                                        </span>
                                    </x-button>
                                </form>
                                <form action="{{ route('memos.destroy', [App\Models\Memo::MEMO_ID_NAME => $memo->id, App\Models\City::CITY_ID_NAME => $cityId]) }}" method="post">
                                    <x-delete />
                                </form>
                            </div>
                        @else
                            @php
                                $user = App\Models\User::find($memo->user_id);
                            @endphp
                            <div class="row p-2 justify-content-center">
                                <div class="col-6">
                                    <img src="{{ $user->img }}" alt="">
                                    <p class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="memo" id="memo">{{ $memo->memo }}</p>
                                    @if ($memo->img)
                                        <img src="{{ $memo->img }}" alt="">
                                    @endif
                                </div>
                                {{-- TODO: 詳細ボタンと削除ボタンを横並びにさせたい --}}
                                {{-- TODO: memos系のurlのときにnavにcreateも表示されるようにしたい --}}
                                <x-linkbutton href="{{ route('responses.create', [App\Models\MemoResponse::MEMO_ID => $memo->id]) }}">
                                    <i class="fas fa-lg fa-reply"></i>
                                </x-linkbutton>
                                <x-linkbutton href="{{ route('memos.show', [App\Models\Memo::MEMO_ID_NAME => $memo->id, App\Models\City::CITY_ID_NAME => $cityId]) }}">
                                    <i class="fas fa-lg fa-file-alt"></i>
                                </x-linkbutton>
                                <form action="{{ route("memos.like", [App\Models\Memo::MEMO_ID_NAME => $memo->id]) }}" method="post">
                                    @csrf
                                    <x-button>
                                        いいね
                                        <span class="badge">
                                            {{ $memo->MemoLikes->count() }}
                                        </span>
                                    </x-button>
                                </form>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>