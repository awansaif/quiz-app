<div>
    <div class="p-4">

    </div>
</div>
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
                    <button wire:click="questionRemove({{ $question->id }})" class="btn">Remove</a>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>
</div>
