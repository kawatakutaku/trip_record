<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-100 leading-tight">
            {{-- TODO: Dashboardのように言語ファイルを使用する --}}
            ブログ一覧
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @foreach ($blogs as $blog)
                        {{-- TODO: どのユーザーの投稿かもわかるようにしたい --}}
                        <div class="row p-2 justify-content-center">
                            <div class="col-6">
                                <p class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="blog" id="blog">{{ $blog->message }}</p>
                            </div>
                            <x-linkbutton href="{{ route('blogs.create') }}">
                                <i class="fas fa-lg fa-pen"></i>
                            </x-linkbutton>
                            <x-linkbutton href="{{ route('blogs.show', ['blog' => $blog->id]) }}">
                                <i class="fas fa-lg fa-file-alt"></i>
                            </x-linkbutton>
                            <i class="fas fa-lg fa-trash-alt"></i>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>