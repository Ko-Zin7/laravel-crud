@extends ('layouts.app')

@section('content')


  <div class="container">

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
          <div class="pull-right">

            <a href="{{URL::to("/posts/edit/$post->id")}}">Edit</a> |
            <a class="text-danger" href="{{URL("/posts/delete/$post->id")}}">Delete</a>

          </div>
        </div>

      </div>
      <h4>Comments({{count($post->comments)}})</h4>
      @foreach ($post->comments as $comment)
        <div class="panel panel-default">
          <div class="panel-body">
            {{$comment->comment}}

          </div>

        </div>
      @endforeach

      <form class="" action="{{url('/comments/add')}}" method="post">
        {{csrf_field()}}
        <input type="hidden" name="post_id" value="{{$post->id}}">
        <textarea name="comment" class="form-control"></textarea>
        <br>
        <input type="submit" class="btn btn-primary" value="Add Comment">

      </form>

      </div>

@endsection
