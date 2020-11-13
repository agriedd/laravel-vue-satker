@php
    $arr = [ 'grid-carousel-galeri--main', 'grid-carousel-galeri--item-1', 'grid-carousel-galeri--item-2', 'grid-carousel-galeri--item-3', 'grid-carousel-galeri--item-4' ]
@endphp
<div class="grid-carousel-galeri h-100">
    @foreach ($arr as $key => $item)
        @if($key != 4)
            <div class="h-100 {{ $item }} bg-white p-lg-4 pt-lg-5 position-relative" style="background-image: url('{{ Storage::disk('public')->url($galeri->get($key)->gambar) }}'); background-size: cover; background-position: center">
                <div class="position-absolute h-100 w-100" style="background: rgba(0, 0, 0, 0); top: 0; left: 0;"></div>
            </div>
        @else
            <div class="h-100 grid-carousel-galeri--item-4 bg-dark d-flex flex-column justify-content-center" style="background-image: url('{{ Storage::disk('public')->url($galeri->get($key)->gambar) }}'); background-size: cover; background-position: center">
                <div class="mx-auto text-white">
                    <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-file-earmark-image-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4 0a2 2 0 0 0-2 2v10.293l2.87-2.87a1 1 0 0 1 1.222-.15l1.77 1.06L9.75 7.69a1 1 0 0 1 1.52-.126L14 10.293V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0H4zM2 14v-.293l3.578-3.577 2.165 1.299.396.237.268-.375 2.157-3.02L14 11.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2zM9.5 1.5v2a1 1 0 0 0 1 1h2l-3-3zm-1.498 4a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                    </svg>
                </div>
            </div>
        @endif
    @endforeach
</div>