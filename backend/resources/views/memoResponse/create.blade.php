<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-100 leading-tight">
            {{ __('memo_response.create') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- TODO: エラーメッセージをそれぞれのフォームの下に表示するにする -->
                    @if ($errors->any())
                        <x-alert />
                    @endif
                    <form action="{{ route('responses.store', [App\Models\MemoResponse::MEMO_ID => $memoId]) }}" method="post">
                        @csrf
                        <div class="row p-2 justify-content-center">
                            <div class="col-6">
                                <x-textarea name="message" id="message" placeholder="メモ">{{ old(App\Models\MemoResponse::MEMO_REPONSE_MESSAGE) }}</x-textarea>
                            </div>
                        </div>
                        {{-- TODO: 画像も一緒に送信する場合は、画像用のカラムを用意する必要がある？ --}}
                        <div class="col-6 col-md-4 col-xl-3 col-xs-12 mx-auto mt-5">
                            <x-button>
                                <i class="fas fa-2x fa-paper-plane"></i>
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>