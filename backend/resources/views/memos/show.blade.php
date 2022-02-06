<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <!-- TODO: Dashboardのように言語ファイルを使用する-->
            詳細画面
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
                        <x-linkbutton href="{{ route('memos.edit', ['memo' => $memo->id]) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                        </x-linkbutton>
                        <!-- TODO: componentの中にformタグ自体も書けるようにしたい -->
                        <form action="{{ route("memos.destroy", ["memo" => $memo->id]) }}" method="post">
                            <x-delete/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>