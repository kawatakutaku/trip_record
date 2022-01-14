<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <!-- TODO Dashboardのように言語ファイルを使用する-->
            詳細画面
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @csrf
                    <!-- TODO タイトル 値みたいな表示の方法を採用する   -->
                    <p name="title" id="title" class="text-black pb-5">{{ $book->title }}</p>
                    <p name="description" id="description" class="text-black pb-5">{{ $book->description }}</p>
                    <p name="book_img" id="book_img" class="text-black pb-5">{{ $book->book_img }}</p>
                    <a name="books_edit" id="books_edit" href="{{ route("books.edit", ["book" => $book->id]) }}" role="button">変更する</a>
                    <form action="{{ route('books.destroy', $book->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="py-4">削除する</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>