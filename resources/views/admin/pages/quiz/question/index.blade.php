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
                    <h3 class="mb-0 float-left">Question List</h3>
                    <a href="{{ Route('admin.questions.create', 'quiz_id=' . Request::get('quiz_id'))  }}"
                        class="btn btn-sm btn-success float-right">Add
                        New</a>

                </div>
                <!-- Light table -->
                <!-- Light table -->
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" class="sort" data-sort="title">Question</th>
                                <th scope="col" class="sort" data-sort="date">Options</th>
                                <th scope="col" class="sort" data-sort="prize">Answer</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            @foreach ($questions as $question)
                            <tr>
                                <td class="email">
                                    <div class="media-body">
                                        <span class="name mb-0 text-sm">{{ $question->question }}</span>
                                    </div>
                                </td>
                                <td class="name">1- {{ $question->option_one }} | 2- {{ $question->option_two }} |
                                    3- {{ $question->option_three }} | 4- {{ $question->option_four }}</td>
                                <td class="city">{{ $question->answer }}</td>

                                <td class="text-center">
                                    <form action="{{ Route('admin.questions.destroy', $question->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn">Remove</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
