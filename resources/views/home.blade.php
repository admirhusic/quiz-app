@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if($userQuizzes->count() > 0)
            <div class="card mt-3">
                <div class="card-header">My quizzes</div>

                <div class="card-body">
                    <ul class="list-group">
                    @foreach($userQuizzes as $quiz)
                   
                    <li class="list-group-item"> 
                 
                     <div class="row">
                        <div class="col">
                            <a href="/quiz/{{ $quiz->id }}" data-toggle="tooltip" data-placement="bottom" title="{{ $quiz->description }}"> <strong>{{ $quiz->name }}  </strong></a>
                        </div>
                        
                   <div class="col text-right">
                    <div class="btn-group">
                        <button type="button" class="btn btn-success dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Options
                        </button>
                        <div class="dropdown-menu">
                        <a class="dropdown-item" href="/quiz/{{ $quiz->id }}"> Show </a>
                        <a class="dropdown-item" href="/quiz/{{ $quiz->id }}/edit">Edit</a> 
                        <form class="form-inline" action="/quiz/{{ $quiz->id }}/delete" method="post">
                            @csrf
                           @method('DELETE')
                        <button type="submit" class="dropdown-item text-danger">Delete</button> 
                       </form>
                        <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="/participate/{{$quiz->id}}">Take the quiz</a>
                        </div>
                    </div>
               
                   </div>
                     </div>

                    </li>

                    @endforeach
                </ul>
                </div>
            </div>
            @else 
            <div class="container text-center">
                <h4>You have no quizes</h4>
                <a class="btn btn-success" href="/quiz/create">Create your first quiz</a>
            </div>
            @endif
            @if($userQuizzes->count() > 0) 
            <a href="/quiz/create" class="btn btn-success mt-3">Create new quiz</a>
            @endif
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



@if(URL::previous() == url('/login'))
<div class="alert alert-success fixed-bottom mb-0">
    Succesfully logged in
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
</div>
@endif



@endsection
