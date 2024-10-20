<x-layout>
<div class="container">
    <div class="row">
    <div class="col col-md-offset-3 col-md-6">
        <nav class="panel panel-default">
            <div class="panel-heading">フォルダを編集する</div>
            <div class="panel-body">
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('folder.update', ['id' => $folder->id]) }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">フォルダ名</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ old('name') ?? $folder->name }}" />
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
</x-layout>