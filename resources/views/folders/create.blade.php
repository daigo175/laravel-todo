<x-layout>
    <div class="container">
        <div class="row">
            <div class="col col-md-offset-3 col-md-6">
                <nav class="panel panel-default">
                    <div class="panel-heading">フォルダを追加する</div>
                    <div class="panel-body">
                        <form action="/folders" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">フォルダ名</label>
                                <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" />
                            </div>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
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
