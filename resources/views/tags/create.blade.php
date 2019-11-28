@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header">
                  {{ isset($tag) ? 'Edit tag' : 'Create tag' }}
                </div>
                @include('partials.errors')
                <div class="card-body">
                  <form action="{{ isset($tag) ? route('tags.update', $tag->id) : route('tags.store') }}" method="POST">
                    @csrf
                    @if(isset($tag))
                    @method('PUT')
                    @endif
                    <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" id="name" class="form-control" name="name" value="{{ isset($tag) ? $tag->name : ' '}}">
                    </div>
                    <div class="form-group">
                      <button class="btn btn-success">
                        {{ isset($tag) ? 'Update tag' : 'Add tag' }}
                      </button>
                    </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
