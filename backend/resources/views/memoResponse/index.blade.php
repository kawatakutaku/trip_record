<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-100 leading-tight">
            {{ __('memo_response.index') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @foreach($memoResponses as $memoResponse)
                        <!-- TODO: どのユーザーの投稿かもわかるようにしたい-->
                        <div class="row p-2 justify-content-center">
                            <div class="col-6">
                                <p class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="message" id="message">{{ $memoResponse->message }}</p>
                            </div>
                            {{-- TODO: 詳細ボタンと削除ボタンを横並びにさせたい --}}
                            <x-linkbutton href="{{ route('responses.show', [App\Models\MemoResponse::MEMO_RESPONSE_ID => $memoResponse->id, App\Models\MemoResponse::MEMO_ID => $memoId]) }}">
                                <i class="fas fa-lg fa-file-alt"></i>
                            </x-linkbutton>
                            <form action="{{ route('responses.destroy', [App\Models\MemoResponse::MEMO_RESPONSE_ID => $memoResponse->id, App\Models\MemoResponse::MEMO_ID => $memoId]) }}" method="post">
                                <x-delete />
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>