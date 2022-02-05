<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <!-- TODO: Dashboardのように言語ファイルを使用する-->
            編集中
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
                    <form action="{{ route('memos.update', ['memo' => $memo->id]) }}" method="post">
                        @method('put')
                        @csrf
                        <div class="mb-4">
                            <!-- TODO: dbから取得したデータを初期値として登録できるようにする(component側の記述を変更する) -->
                            <x-textarea name="memo" id="memo" value="{{ old('memo') ?? $memo->memo }}" />
                        </div>
                        <!-- TODO: カレンダーを使った入力方法を採用する-->
                        <div class="mb-4">
                            <x-input type="text" name="img" id="img" value="{{ old('img') ?? $memo->img }}" />
                        </div>
                        <!-- TODO: 背景色が反映されない-->
                        <div class="flex items-center justify-between">
                            <button class="bg-blue-500 hover:bg-blue-700 text-gray-700 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">変更する </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>