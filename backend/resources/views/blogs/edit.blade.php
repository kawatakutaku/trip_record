<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-100 leading-tight">
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
                    <form action="{{ route('blogs.update', ['blog' => $blog->id, 'cityId' => $cityId]) }}" method="post">
                        @method('put')
                        @csrf
                        <div class="mb-4">
                            <!-- TODO: dbから取得したデータを初期値として登録できるようにする(component側の記述を変更する) -->
                            <x-textarea name="message" id="message">{{ old("message") ?? $blog->message}}</x-textarea>
                        </div>
                        <div class="flex items-center justify-between">
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