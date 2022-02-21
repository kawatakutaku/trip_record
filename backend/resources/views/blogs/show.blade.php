<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-100 leading-tight">
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
                            <p class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name=App\Models\Blog::BLOG_MESSAGE id=App\Models\Blog::BLOG_MESSAGE>{{ $blog->message }}</p>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-xl-3 col-xs-12 mx-auto mt-5">
                        <x-linkbutton href="{{ route('blogs.edit', [App\Models\City::CITY_ID_NAME => $cityId, App\Models\Blog::BLOG_ID_NAME => $blog->id]) }}">
                            <i class="fas fa-lg fa-edit"></i>
                        </x-linkbutton>
                        <!-- TODO: componentの中にformタグ自体も書けるようにしたい -->
                        <form action="{{ route("blogs.destroy", [App\Models\City::CITY_ID_NAME => $cityId, App\Models\Blog::BLOG_ID_NAME => $blog->id]) }}" method="post">
                            <x-delete/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>