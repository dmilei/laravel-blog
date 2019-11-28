@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header">
                  {{ isset($post) ? 'Edit post' : 'Create post' }}
                </div>
                @include('partials.errors')
                <div class="card-body">
                  <form action="{{ isset($post) ? route('posts.update', $post->id) : route('posts.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if(isset($post))
                    @method('PUT')
                    @endif
                    <div class="form-group">
                      <label for="title">Title</label>
                      <input type="text" id="title" class="form-control" name="title" value="{{ isset($post) ? $post->title : ''}}">
                    </div>
                    <div class="form-group">
                      <label for="description">Description</label>
                      <textarea id="description" class="form-control" cols="5" rows="5" name="description">{{ isset($post) ? $post->description : ''}}</textarea>
                    </div>
                    <div class="form-group">
                      <label for="content"content>Content</label>
                      <input id="content" type="hidden" name="content" value="{{ isset($post) ? $post->content : ''}}">
                      <trix-editor input="content"></trix-editor>
                    </div>
                    <div class="form-group">
                      <label for="pusblished_at">Pusblished at</label>
                      <input type="text" id="published_at" class="form-control" name="published_at" value="{{ isset($post) ? $post->published_at : ''}}">
                    </div>
                    @if(isset($post))
                    <div class="form-group">
                      <img src="http://cms.test/storage/{{ $post->image}}" style="width: 100%;">
                    </div>
                    @endif
                    <div class="form-group">
                      <label for="image">Image</label>
                      <input type="file" id="image" class="form-control" name="image">
                    </div>
                    <div class="form-group">
                      <label for="category">Category</label>
                      <select name="category_id" id="category_id" class="form-control">
                        @foreach($categories as $category)
                        <option value="{{$category->id}}"
                          @if(isset($post) && $category->id == $post->category_id)
                            selected
                          @endif
                        >
                          {{$category->name}}
                        </option>
                        @endforeach
                      </select>
                    </div>
                    @if($tags->count()>0)
                    <div class="form-group">
                      <label for="tags">Tags</label>
                      <select class="tag-select-multiple form-control" name="tags[]" id="tags" multiple>
                        @foreach($tags as $tag)
                        <option value="{{$tag->id}}"
                          @if(isset($post) && $post->hasTag($tag->id))
                            selected
                          @endif
                        >
                          {{$tag->name}}
                        </option>
                        @endforeach
                      </select>
                    </div>
                    @endif
                    <div class="form-group">
                      <button type="submit" class="btn btn-success">
                        {{ isset($post) ? 'Update post' : 'Add post' }}
                      </button>
                    </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.0/trix.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.11/js/select2.min.js"></script>
<script>
  flatpickr('#published_at', {
    enableTime: true,
    enableSeconds: true
  });
  $(document).ready(function() {
    $('.tag-select-multiple').select2();
  });
</script>
@endsection
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.0/trix.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.11/css/select2.min.css" rel="stylesheet" />
@endsection
