@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Add new question
                </div>
                <div class="card-body">
                   <form action="/questions/store" method="post">
                    @csrf 
                    <div class="form-group">
                            <label for="questionText">Question:</label>
                            <input type="text" class="form-control  {{ $errors->has('question_text') ? 'is-invalid' : '' }}" placeholder="Enter question" id="questionText" value="{{ old('question_text') }}" name="question_text">
                            @error('question_text')
                            <div class="invalid-feedback">
                               {{ $message }}
                             </div>
                            @enderror
                    </div>
                    <div class="form-group">
                        <label for="questionText">Answer 1</label>
                        <div class="row">
                        <div class="col-sm-10">
                        <input type="text" class="form-control {{ $errors->has('answer1') ? 'is-invalid' : '' }}" placeholder="Enter answer 1" id="answer1" name="answer1" value="{{ old('answer1') }}">
                        @error('answer1')
                        <div class="invalid-feedback">
                           {{ $message }}
                         </div>
                        @enderror
                        </div>
                       <div class="col-sm-2">
                        <div class="form-check mt-2">
                            <input class="form-check-input" type="radio" name="correct_answer" id="correct_answer1" value="answer1" {{ old('correct_answer') == 'answer1' ? 'checked' : '' }}>
                            <label class="form-check-label" for="correct_answer1">
                                <span class="{{ $errors->has('correct_answer') ? 'text-danger' : ''}}">correct</span>
                            </label>
                          </div>
                       </div>
                    </div>
                   </div>
                   <div class="form-group">
                    <label for="questionText">Answer 2</label>
                    <div class="row">
                    <div class="col-sm-10">
                    <input type="text" class="form-control {{ $errors->has('answer2') ? 'is-invalid' : '' }}" placeholder="Enter answer 1" id="answer2" name="answer2" value="{{ old('answer2') }}">
                    @error('answer2')
                    <div class="invalid-feedback">
                       {{ $message }}
                     </div>
                    @enderror
                    </div>
                   <div class="col-sm-2">
                    <div class="form-check mt-2">
                        <input class="form-check-input" type="radio" name="correct_answer" id="correct_answer2" value="answer2" {{ old('correct_answer') == 'answer2' ? 'checked' : '' }}>
                        <label class="form-check-label" for="correct_answer2">
                            <span class="{{ $errors->has('correct_answer') ? 'text-danger' : ''}}">correct</span>
                        </label>
                      </div>
                   </div>
                </div>
               </div>
               <div class="form-group">
                <label for="questionText">Answer 3</label>
                <div class="row">
                <div class="col-sm-10">
                <input type="text" class="form-control {{ $errors->has('answer3') ? 'is-invalid' : '' }}" placeholder="Enter answer 1" id="answer3" name="answer3" value="{{ old('answer3') }}">
                @error('answer3')
                <div class="invalid-feedback">
                   {{ $message }}
                 </div>
                @enderror
                </div>
               <div class="col-sm-2">
                <div class="form-check mt-2">
                    <input class="form-check-input" type="radio" name="correct_answer" id="correct_answer3" value="answer3" {{ old('correct_answer') == 'answer3' ? 'checked' : '' }}>
                    <label class="form-check-label" for="correct_answer3">
                        <span class="{{ $errors->has('correct_answer') ? 'text-danger' : ''}}">correct</span>
                    </label>
                  </div>
               </div>
            </div>
           </div>
           <div class="form-group">
            <label for="questionText">Answer 4</label>
            <div class="row">
            <div class="col-sm-10">
            <input type="text" class="form-control {{ $errors->has('answer4') ? 'is-invalid' : '' }}" placeholder="Enter answer 1" id="answer4" name="answer4" value="{{ old('answer4') }}">
            @error('answer4')
            <div class="invalid-feedback">
               {{ $message }}
             </div>
            @enderror
            </div>
           <div class="col-sm-2">
            <div class="form-check mt-2">
                <input class="form-check-input" type="radio" name="correct_answer" id="correct_answer4" value="answer4" {{ old('correct_answer') == 'answer4' ? 'checked' : '' }}>
                <label class="form-check-label" for="correct_answer4">
                <span class="{{ $errors->has('correct_answer') ? 'text-danger' : ''}}">correct</span>
                </label>
              </div>
           </div>
        </div>
       </div>
        <button type="submit" class="btn btn-success">Save</button>
       @error('correct_answer')

     <span class="text-danger"> {{ $message }}</span>

       @enderror

                  </form>
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
