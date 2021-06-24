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
                    <h3 class="mb-0 float-left">Quiz List</h3>
                    <a href="{{ Route('admin.quizzes.create')  }}" class="btn btn-sm btn-success float-right">Add
                        New</a>

                </div>
                <!-- Light table -->

                @livewire('quiz.index')
            </div>
        </div>
    </div>
</div>

@endsection
