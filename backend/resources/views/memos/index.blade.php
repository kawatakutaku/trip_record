<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-100 leading-tight">
            <!-- TODO: Dashboardのように言語ファイルを使用する-->
            メモの一覧
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @foreach($memos as $memo)
                    <!-- TODO: どのユーザーの投稿かもわかるようにしたい-->
                    <div class="row p-2 justify-content-center">
                        <div class="col-6">
                            <p class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="memo" id="memo">{{ $memo->memo }}</p>
                            <p class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="img" id="img">{{ $memo->img }}</p>
                        </div>
                        <x-linkbutton href="{{ route('memos.show', ['memo' => $memo->id]) }}">
                            <i class="fas fa-lg fa-file-alt"></i>
                            <i class="fas fa-lg fa-trash-alt"></i>
                        </x-linkbutton>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>