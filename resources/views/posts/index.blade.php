@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="d-flex justify-content-end mb-2">
              <a href="{{ route('posts.create')}}" class="btn btn-success float-right">Add post</a>
            </div>
            <div class="card card-default">
                <div class="card-header">Posts</div>
                <div class="card-body">
                  @if($posts->count()>0)
                  <ul class="list-group">
                  @foreach($posts as $post)
                    <li class="list-group-item">
                      <div class="row">
                        <div class="col-sm-6">
                          <img class="img-responsive" src="http://cms.test/storage/{{$post->image}}" style="width: 100px; height: auto;">
                          {{$post->title}}
                        </div>
                        <div class="col-sm-6">
                          <div class="row">
                            <div class="col-sm-6">
                              <a href="{{route('categories.edit', $post->category->id)}}">
                              {{$post->category->name}}
                              </a>
                            </div>
                            <div class="col-sm-6">
                              @if(!$post->trashed())
                              <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-info btn-sm float-right">Edit</a>
                              @else
                              <form action="{{ route('restore-post', $post->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-info btn-sm float-right" style="color: #fff;">Restore</button>
                              </form>
                              @endif
                              <form action="{{ route('posts.destroy', $post->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button style="margin-right: 20px;" class="btn btn-danger btn-sm float-right" type="submit">{{ $post->trashed() ? 'Delete' : 'Trash' }}</button>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </li>
                  @endforeach
                  </ul>
                  @else
                  <h3 class="text-center">No Posts to show</h3>
                  @endif
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <form action="" method="post" id="deleteCategoryForm">
      @csrf
      @method('DELETE')
      <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="deleteModalTitle">Delete Category</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closeModal()">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              Are you sure you want to delete the selected category?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="closeModal()">No, go back</button>
              <button type="submit" class="btn btn-danger">Yes, delete</button>
            </div>
          </div>
        </div>
      </div>
    </form>
</div>
@section('scripts')
<script>
  function handleDelete(id) {
    var element = document.getElementById("deleteModal");
    element.classList.remove("fade");
    element.style.display = "block";
    var form = document.getElementById("deleteCategoryForm");
    form.action = '/categories/' + id;
  }
  function closeModal() {
    var element = document.getElementById("deleteModal");
    element.classList.add("fade");
    element.style.display = "none";
  }
</script>
@endsection
@endsection
