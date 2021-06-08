<div>
    <!-- Main content -->
    <main>
        <!-- Section: Video -->
        <section id="services" class="my-5">
            <div class="container">
                <div class="d-flex justify-content-center position-relative">
                    <div class="to-home position-absolute" style="left: 0; top: 0;">
                        <h4><a href="{{ route('home') }}"><i class="fas fa-arrow-left mr-2"></i>На Главную</a></h4>
                    </div>
                    <div class="video-title">
                        <h1>
                            {{ Str::ucfirst($page->title) }}
                        </h1>
                    </div>
                </div>
                <div class="card card-cascade wider" x-data="{tre : true}" x-show="tre">
                    <!-- Card image -->
                    <div class="view view-cascade overlay" wire:ignore>
                        <video
                                id="my-video-{{ $video->id }}"
                                class="video-js video-frame"
                                style="width:100%; height: auto;"
                                controls
                                poster="{{ asset('thumbnails/'.$video->slug.'.jpg') }}"
                                preload="none"
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
                    <div class="card-body card-body-cascade px-2 py-3" style="z-index: unset;">
                        <!-- Text -->
                        <div class="d-flex justify-content-between">
                            <div>
                                <div class="row card-text">
                                    <div class="col-2">
                                        Тэги:
                                    </div>
                                    <div class="col-10">
                                        <div class="my-0">
                                            @forelse ($video->tags as $tag)
                                            <a href="#.">#{{ $tag->tag }} </a>
                                            @empty
                                            тэгов нет
                                            @endforelse
                                            <!--Menu-->

                                        </div>
                                    </div>
                                </div>
                                <div class="row card-text">
                                    <div class="col-2">
                                        Просмотров:
                                    </div>
                                    <div class="col-10">
                                        {{ $video->views }}
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-column">
                                <a href="#" wire:click.prevent="export">
                                    <i class="fas fa-cloud-download-alt mr-2"></i>Скачать
                                </a>
                                <a href="#" wire:click.prevent="toogleFavorite"
                                   style="{{ $isFavorite ? 'color: orange;' : 'color: grey;' }}">
                                    <i class="far fa-star"></i>В избранное
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-5" style="background-color:#e9edf5">
                <div class="container">
                    {!! $page->body !!}
                </div>
            </div>
            <!-- Text Section -->
        </section>
        <!-- Section: Videos -->
    </main>
    <!-- Main content -->
</div>
