<div>
    {{-- @if(Session::has('message'))
<div class="alert alter-success">
    <p class="font-weight-bold">{{ Session::get('message') }}</p>
</div>
@endif --}}
<div class="table-responsive">
    <table class="table align-items-center table-flush">
        <thead class="thead-light">
            <tr>
                <th scope="col" class="sort" data-sort="title">Title</th>
                <th scope="col" class="sort" data-sort="date">Date Time</th>
                <th scope="col" class="sort" data-sort="prize">Prize</th>
                <th scope="col" class="sort" data-sort="text">Text</th>
                <th scope="col" class="sort" data-sort="video">Video</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody class="list">
            @foreach ($quizzes as $quiz)
            <tr>
                <td class="email">
                    <div class="media-body">
                        <span class="name mb-0 text-sm">{{ $quiz->title }}</span>
                    </div>
                </td>
                <td class="name">{{ $quiz->date_time }}</td>
                <td class="city">{{ $quiz->prize }}</td>
                <td>
                    {{ $quiz->text }}
                </td>
                <td>
                    <video src="{{ $quiz->video }}" controls width="200px" height="100px"></video>
                </td>
                <td class="text-right">
                    <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                            <a class="dropdown-item"
                                href="{{ Route('admin.questions.index','quiz_id='.$quiz->id)  }}">Questions</a>
                            <a class="dropdown-item" href="{{ Route('admin.quizzes.edit', $quiz->id)  }}">Edit</a>
                            <button wire:click="remove({{ $quiz->id }})" class="dropdown-item">Remove</a>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>
</div>
