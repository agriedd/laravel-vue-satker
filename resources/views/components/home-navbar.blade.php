<div class="container-lg">
    <div class="navbar-brand">
        Satker
    </div>
    <div class="d-flex justify-content-center flex-column h-100">
        <button class="btn btn-link shadow-none text-dark navbar-toggler" data-toggle="collapse" data-target="#navbar-home">
            <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-text-left" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M2 12.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z"/>
            </svg>
        </button>
    </div>
    <div class="navbar-collapse collapse" id="navbar-home">
        <ul class="navbar-nav ml-auto">
            <x-navbar.top-item :label="'Home'" :url="route('home')" :param="'/'"></x-navbar.top-item>
            {{-- <x-navbar.top-item :label="'Jemaat'" :url="route('home')"></x-navbar.top-item>
            <x-navbar.top-item-dropdown :label="'Profil'" :url="'profil'">
                <x-navbar.top-item :label="'Sejarah'" :url="route('home')"></x-navbar.top-item>
                <x-navbar.top-item :label="'Profil'" :url="route('home')"></x-navbar.top-item>
            </x-navbar.top-item-dropdown>
            <x-navbar.top-item :label="'Renungan'" :url="route('home')"></x-navbar.top-item>
            <x-navbar.top-item :label="'Galeri'" :url="route('home')"></x-navbar.top-item>
            <x-navbar.top-item :label="'Berita'" :url="route('home')"></x-navbar.top-item> --}}
        </ul>
    </div>
</div>