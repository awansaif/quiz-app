@if(Session::has('message'))
<div class="text-center">
    <p class="text-danger font-weight-bold">{{ Session::get('message') }}</p>
</div>
@endif
