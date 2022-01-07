<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <!-- TODO Dashboardのように言語ファイルを使用する-->
            旅行作成
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- TODO 以下を、bootstrapを使って記述をしているからtailwindに合わせる-->
                    <form action="{{ route('trips.store') }}" method="post">
                        @csrf
                        <div class="row p-2 justify-content-center">
                            <div class="col-6">
                                <input type="text" class="form-control" name="trip_name" id="trip_name" value="{{ old('trip_name') }}" placeholder="旅行のタイトル">
                            </div>
                        </div>
                        <div class="row p-2 mt-3 justify-content-center">
                            <div class="col-6" id="start">
                                <!-- TODO カレンダーを使った入力方法を採用する-->
                                <input type="text" class="form-control" name="start_day" id="start_day" value="{{ old('start_day') }}" placeholder="出発日">
                            </div>
                        </div>
                        <div class="row p-2 mt-3 justify-content-center">
                            <div class="col-6" id="end">
                                <!-- TODO カレンダーを使った入力方法を採用する-->
                                <input type="text" class="form-control" name="end_day" id="end_day" value="{{ old('end_day') }}" placeholder="帰宅日">
                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-xl-3 col-xs-12 mx-auto mt-5">
                            <button type="submit" class="btn btn-outline-light btn-block">次へ</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(function(){
            $.datetimepicker.setLocale('ja');
            $('.bigDate').datetimepicker({
                timepicker: false,
                format: 'Y-m-d',
                numberOfMonths: 2
            });
            let start_time, end_time;
            let now = new Date();
            // 今日の日付-1日しておくことでifが上手くいく
            now.setDate(now.getDate() - 1);
            console.log('now:', now);
            $('#start').find(".bigDate").on("blur", function () {
                let error = false;
                let value = $(this).val();
                // 今日の日付を取得する
                // フォームに入力された年月日のを入れる
                let year_ls = []
                let month_ls = []
                let day_ls = []

                // フォームに入力されたのはstringだから数字に直す
                for (let i=0; i<10; i++){
                    if (i < 4){
                        year_ls += value[i];
                    }else if(4 < i && i < 7){
                        month_ls += value[i];
                    }else if(7 < i){
                        day_ls += value[i];
                    }
                }
                // Dateの月は0~11になっている、日付は当日までをOKにしておくため
                start_time = new Date(Number(year_ls), Number(month_ls)-1, Number(day_ls));
    
                error = start_time.getTime() <= now;
    
                if (error) {
                    //エラーで、エラーメッセージがなかったら
                    if(!$(this).nextAll('span.error-info').length) {
                        //メッセージを後ろに追加
                        $(this).after('<span class = "error-info text-danger">' + now.getFullYear() + '年' + Number(now.getMonth() + 1) + '月' + Number(now.getDate() + 1) + '日' + '以降の日付を入力してください'+ '</span>');
                    }
                }else{
                    //エラーじゃないのにメッセージがあったら
                    if($(this).nextAll('span.error-info').length) {
                        //消す
                        $(this).nextAll('span.error-info').remove();
                    }
                }
    
                $('.bigDate').datetimepicker({
                    defaultDate: start_time,
                    timepicker: false,
                    format: 'Y-m-d',
                    numberOfMonths: 2
                });
            });
            $('#end').find(".bigDate").on("blur", function () {
                let error = false;
                let value = $(this).val();
                // 今日の日付を取得する
                // フォームに入力された年月日のを入れる
                let year_ls = []
                let month_ls = []
                let day_ls = []
    
                // フォームに入力されたのはstringだから数字に直す
                for (let i=0; i<10; i++){
                    if (i < 4){
                        year_ls += value[i];
                    }else if(4 < i && i < 7){
                        month_ls += value[i];
                    }else if(7 < i){
                        day_ls += value[i];
                    }
                }
                // Dateの月は0~11になっている、日付は当日までをOKにしておくため
                end_time = new Date(Number(year_ls), Number(month_ls)-1, Number(day_ls)+1);
                console.log('end:', end);
    
                if (end_time.getTime() <= start_time.getTime()){
                    error = true;
                }
    
                if (error) {
                    //エラーで、エラーメッセージがなかったら
                    if(!$(this).nextAll('span.error-info').length) {
                        //メッセージを後ろに追加
                        $(this).after('<span class = "error-info text-danger">' + start_time.getFullYear() + '年' + Number(start_time.getMonth() + 1) + '月' + start_time.getDate() + '日以降の日付を入力してください'+ '</span>');
                    }
                }else{
                    //エラーじゃないのにメッセージがあったら
                    if($(this).nextAll('span.error-info').length) {
                        //消す
                        $(this).nextAll('span.error-info').remove();
                    }
                }
    
                $('.bigDate').datetimepicker({
                    defaultDate: end_time,
                    timepicker: false,
                    format: 'Y-m-d',
                    numberOfMonths: 2
                });
            });
            $('form').on('submit', function(e){
                if ($('span.error-info').length){
                    console.log('エラーあり');
                    e.preventDefault();
                }
            });
        });
    </script>
</x-app-layout>