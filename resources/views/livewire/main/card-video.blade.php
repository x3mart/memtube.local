<div class="card card-cascade wider col-md-3 my-3">
    <!-- Card image -->
    <div class="view view-cascade overlay" wire:ignore>
        <video
            id="my-video-{{ $video->id }}"
            class="video-js"
            controls
            preload="auto"
            width="255"
            height="170"
            data-setup="{}"
        >
            <source src="{{ asset($video->path) }}" type="video/mp4"/>
            <p class="vjs-no-js">
                To view this video please enable JavaScript, and consider upgrading to a
                web browser that
                <a href="https://videojs.com/html5-video-support/" target="_blank">supports HTML5 video
                </a>
            </p>
        </video>
    </div>

    <!-- Card content -->
    <div class="card-body card-body-cascade px-2 py-1">
        <!-- Title -->
        <h5 class="mb-0 text-center">
            @if(Str::length($video->title) > 20)
                <div data-toggle="tooltip" title="{{ $video->title }}">{{ Str::ucfirst(Str::limit( $video->title, 20)) }}</div>
            @else
                {{ $video->title }}
            @endif
        </h5>
        <!-- Text -->
        <p class="text-center card-text my-0" style="font-size: 12px;">
            @forelse ($video->tags->slice(-3) as $tag)
                <a href="#" wire:click.prevent="$emitUp('setSearch', '{{ $tag->tag }}')">#{{ $tag->tag }} </a>
            @empty
                тэгов нет
            @endforelse
            <!--Menu-->
            @if ($video->tags->count() > 3)
                <a id="dropdownMTags" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    еще {{ $video->tags->count() - 3 }}
                </a>
                <div class="dropdown-menu dropdown-primary" style="max-width:300px;white-space: normal;">
                    @foreach ($video->tags as $tag)
                        <a href="#" wire:click.prevent="$emitUp('setSearch', '{{ $tag->tag }}')">#{{ $tag->tag }} </a>
                    @endforeach
                </div>
            @endif
        </p>
        <div style="display: inline-block; text-align: left; color: grey; width: 48%;">
            <a href="#" style="font-size: 12px; text-align: left; color: grey;">
                <i class="far fa-eye"></i>{{ $video->views }}
            </a>
        </div>
        <div style="display: inline-block; text-align: right; color: grey; width: 48%;">
            <a href="#" wire:click.prevent="toogleFavorite"
            style="font-size: 12px; text-align: right; {{ $isFavorite ? 'color: orange;' : 'color: grey;' }}">
                <i class="far fa-star"></i>
            </a>
            <a href="#" wire:click.prevent="export" style="font-size: 12px; text-align: right; color: grey;">
                <i class="fas fa-cloud-download-alt"></i>
            </a>
        </div>
    </div>
</div>
