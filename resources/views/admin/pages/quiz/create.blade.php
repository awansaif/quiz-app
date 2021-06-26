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
                    <a href="{{ Route('admin.quizzes.index')  }}" class="btn btn-sm btn-success float-right">BACK</a>
                    <h3 class="mb-0 float-left">Add Quiz</h3>

                </div>
                <!-- Light table -->

                <div class="p-4">
                    <x-alert-message />
                    <form method="POST" action="{{Route('admin.quizzes.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group mb-3">
                                    <label for="">Title:</label>
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <input class="form-control" value="{{ old('title') }}" placeholder="Title"
                                            type="text" name="title">
                                    </div>
                                    @error('title')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="date">Date:</label>
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <input class="form-control" value="{{ old('date_time') }}" placeholder="Date"
                                            type="datetime-local" name="date_time" min="{{ date('Y-m-d H:m ') }}">
                                    </div>
                                    @error('date')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="prize">Prize:</label>
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <input class="form-control" value="{{ old('prize') }}" placeholder="Prize"
                                            type="number" name="prize">
                                    </div>
                                    @error('prize')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group mb-3">
                                    <label for="time">Video:</label>
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <input class="form-control" value="{{ old('video') }}" placeholder="Video"
                                            type="file" name="video">
                                    </div>
                                    @error('video')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="prize">Text:</label>
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <textarea class="form-control" placeholder="Text"
                                            name="text">{{ old('text') }}</textarea>
                                    </div>
                                    @error('text')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="text-left">
                            <button type="submit" class="btn btn-primary my-4">Add Quiz</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
