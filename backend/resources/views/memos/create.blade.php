<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-100 leading-tight">
            {{ __('memo.create') }}
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
                    <form action="{{ route('memos.store', [App\Models\City::CITY_ID_NAME => $cityId]) }}" method="post">
                        @csrf
                        <div class="row p-2 justify-content-center">
                            <div class="col-6">
                                <x-textarea name="memo" id="memo" placeholder="メモ">{{ old(App\Models\Memo::MEMO_MEMO) }}</x-textarea>
                            </div>
                        </div>
                        <div class="row p-2 mt-3 justify-content-center">
                            <div class="col-6" id="img">
                                <x-input type="file" name="img" id="img" value="{{ old(App\Models\Memo::MEMO_IMG) }}" placeholder="画像" />
                            </div>
                        </div>
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