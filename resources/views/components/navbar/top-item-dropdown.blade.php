<li class="nav-item small font-weight-bold{{ $active ? ' active' : null }} dropdown">
    <a href="{{ isset($slot) ? "#{$url}" : ($url ?? "#") }}" class="nav-link" data-toggle="dropdown">
        <div class="d-flex">
            <div>
                {{ $label }}
            </div>
            <div class="pl-2">
                <svg width="1rem" height="1rem" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                </svg>
            </div>
        </div>
    </a>
    @isset($slot)
        <ul class="dropdown-menu shadow-sm border-0 rounded-lg">
            {{ $slot }}
        </ul>
    @endisset
</li>