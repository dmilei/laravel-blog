@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header">Users</div>
                <div class="card-body">
                  @if($users->count()>0)
                  <ul class="list-group">
                  @foreach($users as $user)
                    <li class="list-group-item">
                      <div class="row">
                        <div class="col-sm-3">
                          <img style="height: 40px; width: 40px; border-radius: 50%;" src="{{ Gravatar::src($user->email) }}">
                        </div>
                        <div class="col-sm-9">
                          <div class="row">
                            <div class="col-sm-4">
                              {{$user->name}}
                            </div>
                            <div class="col-sm-4">
                              {{$user->email}}
                            </div>
                            <div class="col-sm-4">
                              @if($user->role!='admin')
                              <form action="{{ route('users.make-admin', $user->id) }}" method="POST">
                                @csrf
                                <button class="btn btn-success btn-sm">Make Admin</button>
                              </form>
                              @endif
                            </div>
                          </div>
                        </div>
                      </div>
                    </li>
                  @endforeach
                  </ul>
                  @else
                  <h3 class="text-center">No Users to show</h3>
                  @endif
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
