{{-- @if(Session::has('message'))
<div class="alert alter-success">
    <p class="font-weight-bold">{{ Session::get('message') }}</p>
</div>
@endif --}}
<div class="table-responsive">
    <table class="table align-items-center table-flush">
        <thead class="thead-light">
            <tr>
                <th scope="col" class="sort" data-sort="email">Email</th>
                <th scope="col" class="sort" data-sort="name">Name</th>
                <th scope="col" class="sort" data-sort="dob">DoB</th>
                <th scope="col" class="sort" data-sort="city">City</th>
                <th scope="col" class="sort" data-sort="status">Status</th>
                {{-- <th scope="col"></th> --}}
                <th scope="col" class="sort" data-sort="completion">Register at</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody class="list">
            @foreach ($users as $user)
            <tr>
                <td class="email">
                    <div class="media align-items-center">
                        <a href="#" class="avatar rounded-circle mr-3" data-toggle="tooltip"
                            data-original-title="{{ $user->surname  }}">
                            <img alt="{{ $user->surname  }}" src="{{ $user->avatar  }}">
                        </a>
                        <div class="media-body">
                            <span class="name mb-0 text-sm">{{ $user->email }}</span>
                        </div>
                    </div>
                </td>
                <td class="name">{{ $user->name }}</td>
                <td class="dob">{{ date('d, M Y', strtotime($user->dob)) }}</td>
                <td class="city">{{ $user->city }}</td>
                <td>
                    @if($user->is_active)
                    <span class="badge badge-dot mr-4">
                        <i class="bg-success"></i>
                        <span class="status">Active</span>
                    </span>
                    @else
                    <span class="badge badge-dot mr-4">
                        <i class="bg-warning"></i>
                        <span class="status">Deactive</span>
                    </span>
                    @endif
                </td>
                <td>{{ date('d, M Y h:m:s:a', strtotime($user->created_at)) }}</td>
                <td class="text-right">
                    <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                            <button wire:click="changeStatus({{ $user->id }},{{ $user->is_active? '0' : '1' }})"
                                class="dropdown-item">{{ $user->is_active? 'Deactive' : 'Active' }}</button>
                            {{-- <a class="dropdown-item" href="#">Edit</a> --}}
                            <button wire:click="remove({{ $user->id }})" class="dropdown-item">Remove</a>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
