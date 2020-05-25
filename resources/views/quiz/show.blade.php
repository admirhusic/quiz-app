@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if($quiz->questions->count() > 0)
            <div class="card mt-3">
            <div class="card-header">{{ $quiz->name}} </div>
                <div class="card-body">
                    <h4>Questions:</h4>
                    @foreach($quiz->questions as $key => $question)
                    <div class="card">
                        <div class="card-header">
                           <div class="row">
                               <div class="col">
                                {{$key+1}} . {{ $question->question_text }}
                               </div>
                               <div class="col text-right">
                                <div class="btn-groups">
                                    <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Options
                                    </button>
                                    <div class="dropdown-menu">
                                    <a class="dropdown-item" href="/questions/{{ $question->id }}/edit">Edit</a>
                                    <form class="form-inline" action="/questions/{{ $question->id }}/delete" method="post">
                                        @csrf
                                       @method('DELETE')
                                    <button type="submit" class="dropdown-item text-danger">Delete</button> 
                                   </form>
                                    </div>
                                </div>
                               </div>
                           </div>

                        </div>
                        <div class="card-body">
                            <ul class="list-group">
                                @foreach($question->answers as $answer)
                              <li class="list-group-item" >{{ $answer->answer_text }}  
                                 @if($answer->correct)
                                 <span class="badge badge-success">correct answer</span>
                                 @endif
                              </li>
                                @endforeach
                              </ul>
                        </div>
                    </div>
                    @endforeach
                </div>
                @else 
                <div class="container text-center">
                    <h4>You have no questions</h4>
                    <a class="btn btn-success" href="/questions/create">Create your first question </a>
                </div>
                @endif
            </div>
             @if($quiz->questions->count() > 0) 
             <a href="/questions/create" class="btn btn-success mt-3">Add more questions</a>
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

@endsection
