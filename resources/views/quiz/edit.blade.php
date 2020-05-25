@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                Edit Quiz
              </div>
            <div class="card-body">
            <form action="/quiz/{{$quiz->id}}/update" method="post">
                    @csrf
                    <div class="form-group">
                      <label for="name">Quiz name</label>
                    <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name" placeholder="Enter quiz name" name="name" value="{{$quiz->name}}">
                      @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="description">Description</label>
                    <input type="text" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" id="description" placeholder="Enter description" name="description" value="{{$quiz->description}}">
                    @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                  </form>
            </div>
          </div>
            </div>
        </div>
    </div>
 
</div>

@if(Session::has('message'))
<div class="alert alert-success fixed-bottom mb-0">
    {{Session::get('message')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
</div>
@endif

@endsection
