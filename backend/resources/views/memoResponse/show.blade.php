<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-100 leading-tight">
            {{ __('memo_response.show') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="row p-2 justify-content-center">
                        <div class="col-6">
                            <p class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="message" id="message">{{ $response->message }}</p>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-xl-3 col-xs-12 mx-auto mt-5">
                        <x-linkbutton href="{{ route('responses.edit', [App\Models\MemoResponse::MEMO_RESPONSE_ID => $response->id]) }}">
                            <i class="fas fa-lg fa-edit"></i>
                        </x-linkbutton>
                        <!-- TODO: componentの中にformタグ自体も書けるようにしたい -->
                        <form action="{{ route("responses.destroy", [App\Models\MemoResponse::MEMO_RESPONSE_ID => $response->id]) }}" method="post">
                            <x-delete/>
                        </form>
                        {{-- <form action="{{ route("responses.like", [App\Models\MemoResponse::MEMO_ID => $memoId]) }}" method="post"> --}}
                            @csrf
                            <x-button>
                                いいね
                                <span class="badge">
                                    {{-- {{ $response->memoResopseGoods->count() }} --}}
                                </span>
                            </x-button>
                        {{-- </form> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>