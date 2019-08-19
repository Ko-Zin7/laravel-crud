@extends ('layouts.app')

@section('content')


  <div class="container">
    @if(session('info'))
      <div class="alert alert-info">
        {{session('info')}}

      </div>
    @endif

    @foreach ($posts as $post)
      <div class="panel panel-default">
        <div class="panel-heading">
          <a href="{{URL("/posts/view/$post->id")}}">{{$post->title}}</a>
        </div>
        <div class="panel-body">
          {{$post->body}}

        </div>
        <div class="panel-footer">
          <strong>{{$post->category->name}},</strong>
          {{$post->created_at->diffForHumans()}}
          {{count($post->comments)}} comments

        </div>

      </div>

    @endforeach
    {{$posts->links()}}
  </div>

@endsection
