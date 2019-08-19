@extends('layouts.app')

@section('content')

  <div class="container">
    <h1>Add post</h1>

      <!-- @if ($errors->any())
      <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            {{$error}}<br>
        @endforeach
      </div>

      @endif -->

      <form  method="post">
        {{csrf_field()}}
        <div class="form-group">
          <label for="">Title</label>
          <input type="text" name="title"
          value="{{$post->title}}" class="form-control">

        </div>
        <div class="form-group">
          <label for="">Body</label>
          <textarea name="body" class="form-control">{{$post->body}}</textarea>

        </div>
        <div class="form-group">
          <label for="">Category</label>
          <select class="form-control" name="category_id">
            
            @foreach ($categories as $category)

              <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach

          </select>

        </div>
      <div class="form-group">
          <input type="submit" value="Update Post" class="btn btn-primary">
      </div>

      </form>


  </div>

@endsection
