<div class="container-fluid mt--6">
    <div class="row">
        <div class="col-xl-4 order-xl-2">
            <div class="card card-profile">
                <img src="{{ asset('assets/img/theme/img-1-1000x600.jpg') }}" alt="Image placeholder"
                    class="card-img-top">
                <div class="row justify-content-center">
                    <div class="col-lg-3 order-lg-2">
                        <div class="card-profile-image">
                            <a href="#">
                                <img src="{{ Auth::guard('admin')->user()->avatar }}" class="rounded-circle">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col">
                            <div class="card-profile-stats d-flex justify-content-center">

                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <h5 class="h3">{{ Auth::guard('admin')->user()->name  }}
                            <span class="font-weight-light">
                            </span>
                        </h5>
                        <div class="h5 font-weight-300">
                            <i class="ni location_pin mr-2"></i>Bucharest, Romania
                        </div>
                        <div class="h5 mt-4">
                            <i class="ni business_briefcase-24 mr-2"></i>Solution Manager - Creative Tim Officer
                        </div>
                        <div>
                            <i class="ni education_hat mr-2"></i>University of Computer Science
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-8 order-xl-1">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Edit profile </h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    {{-- <h6 class="heading-small text-muted mb-4">Admin information</h6> --}}
                    {{-- <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-username">Username</label>
                                        <input type="text" id="input-username" class="form-control"
                                            placeholder="Username" value="lucky.jesse">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-email">Email address</label>
                                        <input type="email" id="input-email" class="form-control"
                                            placeholder="jesse@example.com">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-first-name">First name</label>
                                        <input type="text" id="input-first-name" class="form-control"
                                            placeholder="First name" value="Lucky">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-last-name">Last name</label>
                                        <input type="text" id="input-last-name" class="form-control"
                                            placeholder="Last name" value="Jesse">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="my-4" /> --}}
                    <!-- Address -->
                    <h6 class="heading-small text-muted mb-4">Setting information</h6>
                    @if($message)
                    <div class="alert {{ $class }}">
                        <span class="font-weight-bold">{{ $message }}</span>
                    </div>
                    @endif
                    <form wire:submit.prevent="changePassword" method="post">
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-control-label" for="current_password">Current
                                            Password</label>
                                        <input type="text" id="current_password" class="form-control"
                                            placeholder="Current Password" wire:model.lazy="current_password">
                                    </div>
                                    @error('current_password')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-control-label" for="new_password">New Password</label>
                                        <input type="password" id="new_password" class="form-control"
                                            placeholder="New Password" wire:model.lazy="new_password">
                                    </div>
                                    @error('new_password')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-sm-6">
                                    <button class="btn btn-success rounded">Update</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    {{-- <hr class="my-4" />
                        <!-- Description -->
                        <h6 class="heading-small text-muted mb-4">About me</h6>
                        <div class="pl-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">About Me</label>
                                <textarea rows="4" class="form-control"
                                    placeholder="A few words about you ...">A beautiful Dashboard for Bootstrap 4. It is Free and Open Source.</textarea>
                            </div>
                        </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
