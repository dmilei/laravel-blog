@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="d-flex justify-content-end mb-2">
              <a href="{{ route('categories.create')}}" class="btn btn-success float-right">Add category</a>
            </div>
            <div class="card card-default">
                <div class="card-header">Categories</div>
                <div class="card-body">
                  @if($categories->count() > 0)
                  <ul class="list-group">
                  @foreach($categories as $category)
                    <li class="list-group-item">
                      <div class="row">
                        <div class="col-sm-5">
                          {{$category->name}}
                        </div>
                        <div class="col-sm-3">
                          {{$category->posts->count()}}
                        </div>
                        <div class="col-sm-4">
                          <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-info btn-sm float-right">Edit</a>
                          <button style="margin-right: 20px;" class="btn btn-danger btn-sm float-right" onclick="handleDelete({{$category->id}})">Delete</button>
                        </div>
                      </div>
                    </li>
                  @endforeach
                  </ul>
                  @else
                  <h3 class="text-center">No Categories to show</h3>
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
