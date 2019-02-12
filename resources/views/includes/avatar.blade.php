@if (Auth::user()->image)
    <div class="container-avatar">
        <img src="{{ route('user.avatar', ['filename' => Auth::user()->image]) }}" class="avatar">
    </div>
@else
    <div class="container-avatar">
        <img src="{{ asset('img/profile.svg') }}" class="avatar">
    </div>
@endif
