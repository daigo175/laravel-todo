<x-layout>
    <x-slot:style>
        <!-- 「flatpickr」：デフォルトスタイルシートをインポート -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        <!-- 「flatpickr」：ブルーテーマの追加スタイルシートをインポート -->
        <link rel="stylesheet" href="https://npmcdn.com/flatpickr/dist/themes/material_blue.css">
    </x-slot>

    <div class="container">
        <div class="row">
            <div class="col col-md-offset-3 col-md-6">
                <nav class="panel panel-default">
                    <div class="panel-heading">タスクを追加する</div>
                    <div class="panel-body">
                        @if($errors->any())
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $message)
                                <p>{{ $message }}</p>
                            @endforeach
                        </div>
                        @endif
                        <form action="{{ route('tasks.store', ['id' => $folder_id]) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="title">タスク名</label>
                                <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}" />
                            </div>
                            <div class="form-group">
                                <label for="due_date">期限</label>
                                <input type="text" class="form-control" name="due_date" id="due_date" value="{{ old('due_date') }}" />
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">送信</button>
                            </div>
                        </form>
                    </div>
                </nav>
            </div>
        </div>
    </div>

    <x-slot:script>
        <!--
        * 「flatpickr」javascriptライブラリー
        * 機能：日付のカレンダー表示からの日付取得
        -->
        <script src="https://npmcdn.com/flatpickr/dist/flatpickr.min.js"></script>
        <script src="https://npmcdn.com/flatpickr/dist/l10n/ja.js"></script>
        <script>
            flatpickr(document.getElementById('due_date'), {
                locale: 'ja',
                dateFormat: "Y/m/d",
                minDate: new Date()
            });
        </script>
    </x-slot>
</x-layout>
