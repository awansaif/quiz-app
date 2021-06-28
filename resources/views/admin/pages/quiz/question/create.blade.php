@extends('admin.layout.admin')
@section('title')
Quizzes
@endsection

@section('content')
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
        </div>
    </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header border-0">
                    <a href="{{ Route('admin.questions.index','quiz_id='.Request::get('quiz_id'))  }}"
                        class="btn btn-sm btn-success float-right">BACK</a>
                    <h3 class="mb-0 float-left">Add Quiz</h3>

                </div>
                <!-- Light table -->

                <div class="p-4">
                    @livewire('question.create', ['quizId' => Request::get('quiz_id')])
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
