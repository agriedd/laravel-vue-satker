<div class="navbar navbar-light navbar-expand-md shadow">
    <ul class="navbar-nav mx-auto">
        @for ($i = 0; $i < 9; $i++)
            <x-navbar.homeItem :label="'Rayon ' . ($i + 1)" url="#"></x-navbar.homeItem>
        @endfor
    </ul>
</div>