@extends('layouts.layout', ['title' => "Пост №$post->post_id. $post->title"])

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header"><h2>{{ $post->title }}</h2></div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="card-img card-img_max"  style="background-image: url({{ $post->img ?? asset('img/defult
                    .jpg')}})">

                    </div>
                    <!-- /.card-img -->
                    <div class="card-author">Описание: {{ $post->desc }}</div>
                    <div class="card-author">Автор: {{ $post->name }}</div>
                    <div class="card-date">Пост создан: {{ $post->created_at->diffForHumans() }}</div>
                    <!-- /.card-author -->
                    <div class="card-btn">
                        <a href="{{ route('post.index') }}" class="btn btn-outline-primary">На главную</a>
                        <!-- /.btn -->
                        <a href="{{ route('post.edit', ['id' => $post->post_id]) }}" class="btn btn-outline-secondary">Редактировать</a>
                        <!-- /.btn -->
                        <form action="{{ route('post.destroy', ['id' => $post->post_id]) }}" method="post"
                              onsubmit="if(confirm('Точно удалить пост?')) { return true } else { return false }">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="btn btn-outline-danger" value="Удалить">
                        </form>
                        <!-- /.btn -->
                    </div>
                    <!-- /.card-btn -->
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col-6 -->
    </div>
    <!-- /.row -->


@endsection
