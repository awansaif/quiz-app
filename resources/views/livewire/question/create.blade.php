<div>
    <x-alert-message />
    <form method="POST" wire:submit.prevent="addquestion">
        @csrf
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group mb-3">
                    <label for="">Qustion: {{ $quiz_id }}</label>
                    <div class="input-group input-group-merge input-group-alternative">
                        <input class="form-control" placeholder="Question" type="text" wire:model.lazy="questionw">
                    </div>
                    @error('questionw')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group mb-3">
                    <label for="time">Option One:</label>
                    <div class="input-group input-group-merge input-group-alternative">
                        <input class="form-control" placeholder="option_one" type="text" wire:model.lazy="option_one">
                    </div>
                    @error('option_one')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="prize">Option Two:</label>
                    <div class="input-group input-group-merge input-group-alternative">
                        <input class="form-control" placeholder="Option Two" type="text" wire:model.lazy="option_two">
                    </div>
                    @error('option_two')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group mb-3">
                    <label for="time">Option Three:</label>
                    <div class="input-group input-group-merge input-group-alternative">
                        <input class="form-control" placeholder="Option Three" type="text"
                            wire:model.lazy="option_three">
                    </div>
                    @error('option_three')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="prize">Option Four:</label>
                    <div class="input-group input-group-merge input-group-alternative">
                        <input class="form-control" placeholder="Option Four" required type="text"
                            wire:model.lazy="option_four">
                    </div>
                    @error('option_four')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group mb-3">
                    <label for="time">Answer:</label>
                    <div class="input-group input-group-merge input-group-alternative">
                        <select wire:model.lazy="answer" class="form-control" id="answer">
                            <option value="" selected disabled>Choose Correct Answer</option>
                            <option value="{{ $option_one  }}">{{ $option_one }}</option>
                            <option value="{{ $option_two  }}">{{ $option_two }}</option>
                            <option value="{{ $option_three  }}">{{ $option_three }}</option>
                            <option value="{{ $option_four  }}">{{ $option_four}}</option>
                            {{-- {{ $option_one? '<option value="'+$option_one+'">'+$option_one+'</option>' : '' }}
                            {{ $option_two? '<option value="'+$option_two+'">'+$option_two+'</option>' : '' }}
                            {{ $option_three? '<option value="'+$option_three+'">'+$option_three+'</option>' : '' }}
                            {{ $option_four? '<option value="'+$option_four+'">'+$option_four+'</option>' : '' }}
                            --}}
                        </select>
                    </div>
                    @error('answer')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <div class="text-left">
            <button type="submit" class="btn btn-primary my-4">Add Question</button>
        </div>
    </form>
</div>
