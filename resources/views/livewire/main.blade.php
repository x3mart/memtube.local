<div>
    <!-- Main content -->
    <main>

        <div class="container" x-data="{active : @entangle('sort')}">

            <div class="active-purple-4 mb-4 card" style="font-size: 2rem; margin-top: -22px;">
                <input class="form-control form-control-lg" type="text" placeholder="Поиск" id="prefixInside"
                       aria-label="Search" wire:model="search">
            </div>

            <!-- Section: Videos -->
            <section id="services" class="mb-5">

                <div class="category-menu d-flex">
                    <ul class="mx-auto smooth-scroll">
                        <li class="nav-item">
                            <a class="nav-link waves-effect waves-light" x-bind:class="{'active-category': active == 'date'}" wire:click.prevent="$set('sort', 'date')" href="#">Новинки <span
                                    class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link waves-effect waves-light" x-bind:class="{'active-category': active == 'top'}" wire:click.prevent="$set('sort', 'top')" href="#" data-offset="90">Топ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link waves-effect waves-light" href="#" data-offset="90">Все</a>
                        </li>
                    </ul>
                </div>

                <div class="row">
                    @forelse ($videos as $item)
                        <!-- Card Wider -->
                        <div class="card card-cascade wider col-md-3 my-3">
                            <!-- Card image -->
                            <div class="view view-cascade overlay">
                                <video
                                        id="my-video"
                                        class="video-js"
                                        controls
                                        preload="auto"
                                        width="255"
                                        height="170"
                                        data-setup="{}"
                                >
                                    <source src="video_src" type="video/mp4"/>
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
                                <h5 class="mb-0 text-center">{{ Str::limit( $item->title, 20) }}.</h5>
                                <!-- Text -->
                                <p class="text-center card-text my-0" style="font-size: 12px;">
                                    @forelse ($item->tags->slice(-3) as $tag)
                                        <a href="#" wire:click.prevent="$set('search', '{{ $tag->tag }}')">#{{ $tag->tag }} </a>
                                    @empty
                                        тэгов нет
                                    @endforelse
                                    @if ($item->tags->count() > 3)
                                    еще {{ $item->tags->count() - 3 }}
                                    @endif
                                </p>
                                <div style="display: inline-block; text-align: left; color: grey; width: 48%;"><a href="#" style="font-size: 12px; text-align: left; color: grey;">
                                <i class="far fa-eye"></i>{{ $item->views }}</a></div>
                                <div style="display: inline-block; text-align: right; color: grey; width: 48%;">
                                    <a href="#" style="font-size: 12px; text-align: right; color: grey;">
                                        <i class="far fa-star"></i>
                                    </a>
                                    <a href="#" style="font-size: 12px; text-align: right; color: grey;">
                                        <i class="fas fa-cloud-download-alt"></i>
                                    </a>
                                </div>
                            </div>

                        </div>
                        <!-- Card Wider -->
                    @empty
                        <div class="mx-auto">
                            Таких видео нет
                        </div>
                    @endforelse
                </div>
                @if ($videosCount - $limit > 0)
                    <div class="text-center">
                        <button class="btn purple-gradient btn-rounded" wire:click.prevent="moreVideos"><i class="fas fa-arrow-circle-down"></i> Показать еще
                        </button>
                    </div>
                @endif
            </section>
            <!-- Section: Videos -->


        </div>

    </main>
    <!-- Main content -->
</div>
