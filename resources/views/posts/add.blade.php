@extends('layouts.app')

@section('content')

  <div class="container">
    <h1>Add post</h1>

      @if ($errors->any())
      <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            {{$error}}<br>
        @endforeach
      </div>

      @endif

      <form  method="post">
        {{csrf_field()}}
        <div class="form-group">
          <label for="">Title</label>
          <input type="text" name="title" class="form-control">

        </div>
        <div class="form-group">
          <label for="">Body</label>
          <textarea name="body" class="form-control"></textarea>

        </div>
        <div class="form-group">
          <label for="">Category</label>
          <select class="form-control" name="category_id">
            <!-- <option disabled selected>-select-</option>
            <option value="1">Technology</option>
            <option value="2">Business</option>
            <option value="3">Information</option> -->
            @foreach ($categories as $category)

              <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach

          </select>

        </div>
      <div class="form-group">
          <input type="submit" value="Add Post" class="btn btn-primary">
      </div>

      </form>


  </div>

@endsection
