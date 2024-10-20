<x-layout>
    <div class="container">
        <div class="row">
            <div class="col col-md-4">
                <nav class="panel panel-default">
                    <div class="panel-heading">フォルダ</div>
                    <div class="panel-body">
                        <a href="/folders/create" class="btn btn-default btn-block">
                            フォルダを追加する
                        </a>
                    </div>
                    <div class="list-group">
                        <table class="table foler-table">
                            @foreach($folders as $folder)
                            <tr>
                                <td>
                                    <a href="{{ route('tasks.index', ['id' => $folder->id]) }}" class="list-group-item {{ $folder_id === $folder->id ? 'active' : ''}}">
                                        {{ $folder->name }}
                                    </a>
                                </td>
                                <td><a href="{{ route('folder.edit', ['id' => $folder->id]) }}">編集</a></td>
                                <td><a href="#">削除</a></td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </nav>
            </div>
            <div class="column col-md-8">
            <!-- ここにタスクが表示される -->
            <div class="panel panel-default">
                <div class="panel-heading">タスク</div>
                    <div class="panel-body">
                        <div class="text-right">
                            <a href="{{ route('tasks.create', ['id' => $folder_id]) }}" class="btn btn-default btn-block">
                                タスクを追加する
                            </a>
                        </div>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>タイトル</th>
                                <th>状態</th>
                                <th>期限</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tasks as $task)
                                <tr>
                                    <td>{{ $task->title }}</td>
                                    <td>
                                        <span class="label {{ $task->status->cssClass() }}">
                                            {{ $task->status->name }}
                                        </span>
                                    </td>
                                    <td>{{ $task->due_date }}</td>
                                    <td><a href="#">編集</a></td>
                                    <td><a href="#">削除</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-layout>