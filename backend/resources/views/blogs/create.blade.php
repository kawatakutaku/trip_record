<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-100 leading-tight">
            <!-- TODO: Dashboardのように言語ファイルを使用する-->
            ブログの作成画面
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
                    <form action="{{ route('blogs.store') }}" method="post">
                        @csrf
                        <div class="row p-2 justify-content-center">
                            <div class="col-6">
                                <x-textarea name="blog" id="blog" value="{{ old('blog') }}" placeholder="ブログ" />
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