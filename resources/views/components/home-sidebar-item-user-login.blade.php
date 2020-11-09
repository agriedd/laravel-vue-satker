<div>
    @auth()
        <div data-toggle="tooltip" data-placement="right" title="Panel Admin" class="border-top">
            <x-home-sidebar-item :url="route('home')">
                <div class="rounded-circle" style="height: 2.5rem; width: 2.5rem; background-image: url('{{ optional($user->foto)->src_xs }}'); background-position: center; background-size: cover;"></div>
            </x-home-sidebar-item>
        </div>
    @else
        <div data-toggle="tooltip" data-placement="right" title="Masuk">
            <x-home-sidebar-item :url="route('login')">
                <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-person-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z"/>
                    <path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                    <path fill-rule="evenodd" d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z"/>
                </svg>
            </x-home-sidebar-item>
        </div>
    @endauth
</div>