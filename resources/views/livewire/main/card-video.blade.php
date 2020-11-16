<div class="card card-cascade wider col-md-3 my-3" x-data="{tre : true}" x-show="tre">
    <!-- Card image -->
    <div class="view view-cascade overlay">
        <video
            id="my-video-{{ $video->id }}"
            class="video-js video-frame"
            controls
            preload="metadata"
            data-setup="{}"
            x-on:ended="$wire.increment()"
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
                {{ Str::ucfirst($video->title) }}
            @endif
        </h5>
        <!-- Text -->
        <div class="text-center card-text my-0" style="font-size: 12px;">
            @forelse ($video->tags->slice(-3) as $tag)
                <a href="#" wire:click.prevent="$emitUp('setSearch', '{{ $tag->tag }}')">#{{ $tag->tag }} </a>
            @empty
                тэгов нет
            @endforelse
            <!--Menu-->
            @if ($video->tags->count() > 3)
                <div class="dropdown d-inline-block">
                    <a id="dropdownTags" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        еще {{ $video->tags->count() - 3 }}
                    </a>
                    <div class="dropdown-menu dropdown-primary" style="max-width:300px;white-space: normal;z-index: 999!important;">
                        @foreach ($video->tags as $tag)
                            <a href="#" wire:click.prevent="$emitUp('setSearch', '{{ $tag->tag }}')">#{{ $tag->tag }} </a>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
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
