@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if($correctAnswers->count() > 0)
                <h4 class="text-success">Correct</h4>
               @foreach ($correctAnswers as $result)
                   <div class="card mb-3 border-success text-success">
                       <div class="card-header">
                           {{$result->question->question_text}}
                       </div>
                           <div class="card-body">
                                {{$result->answer_text}}
                           </div>
                   </div>
               @endforeach
               @endif

               @if($uncorrectAnswers->count() > 0)
                <h4 class="text-danger">Incorrect</h4>
               @foreach ($uncorrectAnswers as $result)
                   <div class="card mb-3 border-danger text-danger">
                       <div class="card-header">
                           {{$result->question->question_text}}
                       </div>
                           <div class="card-body">
                                {{$result->answer_text}}
                           </div>
                   </div>
               @endforeach
               @endif










        </div>
    </div>
</div>
@endsection
