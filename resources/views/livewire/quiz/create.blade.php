<div>
    <div class="p-4">
        <alert-message />
        <form method="POST" wire:submit.prevent="addquiz" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group mb-3">
                        <label for="">Title:</label>
                        <div class="input-group input-group-merge input-group-alternative">
                            <input class="form-control" placeholder="Title" type="text" wire:model.defer="title">
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
                            <input class="form-control" placeholder="Date" type="date" wire:model.defer="date"
                                min="{{ date('Y-m-d') }}">
                        </div>
                        @error('date')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group mb-3">
                        <label for="time">Time:</label>
                        <div class="input-group input-group-merge input-group-alternative">
                            <input class="form-control" placeholder="Time" type="time" wire:model.defer="time">
                        </div>
                        @error('time')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="prize">Prize:</label>
                        <div class="input-group input-group-merge input-group-alternative">
                            <input class="form-control" placeholder="Prize" type="number" wire:model.defer="prize">
                        </div>
                        @error('prize')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group mb-3">
                        <label for="time">Video:</label>
                        <div class="input-group input-group-merge input-group-alternative">
                            <input class="form-control" placeholder="Video" type="file" wire:model.defer="video">
                        </div>
                        @error('video')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="prize">Text:</label>
                        <div class="input-group input-group-merge input-group-alternative">
                            <textarea class="form-control" placeholder="Text" wire:model.defer="text"></textarea>
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
