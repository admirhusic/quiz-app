@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
          <form action="/participate/results" method="post">
            @csrf
         @foreach ( $questions as $key => $question )
        <div id="question{{ $key+1 }}" class="card mb-5">
            <div class="card-header">
                <h3>{{$key+1}}. {{ $question->question_text }}</h3>
            </div>
            
          <div class="card-body">
            <ul class="list-group">
                @foreach ( $question->answers as $answer )
                    <li class="list-group-item">
                        <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="{{$answer->id}}" name="answers[]{{$question->id}}" value="{{$answer->id}}">
                        <label class="custom-control-label" for="{{$answer->id}}">{{$answer->answer_text}}</label>
                          </div>
                   </li>
                   @endforeach
                </ul>
          </div>
           
               
         </div>
         @endforeach

    


         <div id="finish" class="text-center">
            <button type="submit" class="btn btn-success btn-block btn-lg">Submit</button>
            @error('answers')
          <span class="text-danger">You must answer at least one question</span>
            @enderror
         </div>
        </form>
      </div>
  </div>
</div>
</body>
@endsection
