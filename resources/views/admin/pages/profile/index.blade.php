@extends('admin.layout.admin')
@section('title')
Profile
@endsection

@section('content')
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
        </div>
    </div>
</div>
<!-- Page content -->
@livewire('admin.user-profile')
@endsection
