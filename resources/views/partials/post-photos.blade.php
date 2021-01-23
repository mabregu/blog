@if ($post->photos->count() === 1)
    <figure>
        <img src="{{ $post->photos->first()->url }}"
            alt="{{ $post->title }}"
            class="img-responsive"
        >
    </figure>
@elseif ($post->photos->count() > 1)
    <div class="gallery-photos masonry">
        @foreach ($post->photos as $photo)
            {{-- <figure class="gallery-image">
                <img src="{{ url($photo->url) }}" alt="{{ $post->title }}">
            </figure> --}}
            <figure class="gallery-image">
                <img src="img/img-post-gallery-1.png" alt="">
            </figure>
        @endforeach
    </div>
@endif

{{-- @push('styles')
    <link rel="stylesheet" href="/admin-lte/plugins/ekko-lightbox/ekko-lightbox.css">
@endpush

@push('scripts')
    <script src="/admin-lte/plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
    <script>
        $(document).on('click', '[data-toggle="lightbox"]', function(event) {
          event.preventDefault();
          $(this).ekkoLightbox({
            alwaysShowClose: true
          });
        });
    </script>
@endpush --}}

