@extends('layouts.app')

@section('content')
 
<div class="container text-center">
    <div class="row justify-content-center">
      <div class="col-md-8">
        @if($quizzes->count() > 0 )  
        <ul class="list-group text-center w-100">
            @foreach ($quizzes as $quiz )
                @if($quiz->questions->count() > 0)
                <li class="list-group-item">
                <h3> <a href="/participate/{{ $quiz->id }}"> {{$quiz->name}}</a></h3>
                   <p> {{$quiz->description}}</p>
                   <small>Number of questions: {{$quiz->questions->count()}}</small>
                </li>
                @endif
           @endforeach
        </ul>
      @endif
      </div>
    </div>
</div>
@endsection
