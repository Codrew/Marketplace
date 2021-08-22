<div class="card">
    <div class="card-body">
        @if (!Auth::User()->avatar)
            <img src="/img/man.jpg" class="mx-auto d-block img-thumbnail" width="130">
        @else
            <img src="{{ Storage::url(Auth::user()->avatar) }}" class="mx-auto d-block img-thumbnail" width="130">
        @endif
        <p class="text-center"><b>Jhon Doe</b></p>
    </div>
    <hr style="border:2px solid blue">
    <div class="vertical-menu">
        <a href="#">Dashboard</a>
        <a href="{{ route('profile.index') }}" class="{{ request()->is('profile') ? 'active' : '' }}">Profile</a>
        <a href="{{ route('ads.create') }}" class="{{ request()->is('ads/create') ? 'active' : '' }}">Create
            ads</a>
        <a href="{{ route('ads.index') }}" class="{{ request()->is('ads') ? 'active' : '' }}">Published ads</a>
        <a href=" #">message</a>
    </div>
</div>
