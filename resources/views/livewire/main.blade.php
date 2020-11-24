<div>
    <!-- Main content -->
    <main>

        <div class="container" x-data="{sortMode : @entangle('sort'), getMode : @entangle('mode')}">

            <div class="active-purple-4 mb-4 card" style="font-size: 2rem; margin-top: -22px;">
                <input class="form-control form-control-lg" type="text" placeholder="Поиск" id="prefixInside"
                       aria-label="Search" wire:model="search">
            </div>
            <!-- Section: Videos -->
            <section id="services" class="mb-5">
                <div class="category-menu d-flex">
                    <ul class="mx-auto smooth-scroll">
                        <li class="nav-item">
                            <a class="nav-link waves-effect waves-light" x-bind:class="{'active-category': sortMode == 'date'}" wire:click.prevent="$set('sort', 'date')" href="">Новинки </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link waves-effect waves-light" x-bind:class="{'active-category': sortMode == 'top'}" wire:click.prevent="$set('sort', 'top')" href="" >Топ</a>
                        </li>
                        @auth
                        <li class="nav-item">
                            <a class="nav-link waves-effect waves-light" x-bind:class="{'active-category': getMode == 'all'}" wire:click.prevent="setToAll" href="" >Все</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link waves-effect waves-light" x-bind:class="{'active-category': getMode == 'favorite'}" wire:click.prevent="setToFavorites" href="" >Любимые</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link waves-effect waves-light" x-bind:class="{'active-category': getMode == 'download'}" wire:click.prevent="setToDownloads" href="" >Загрузки</a>
                        </li>
                        @endauth
                    </ul>
                </div>

                <div class="row">
                    @forelse ($videos as $item)
                        <!-- Card Wider -->
                        <livewire:main.card-video :video="$item" :mode="$mode" :favorites="$favorite" :key="'video-'.$item->id.time()" >
                        <!-- Card Wider -->
                    @empty
                        <div class="mx-auto">
                            Пусто
                        </div>
                    @endforelse
                </div>
                @if ($videosCount - $limit > 0)
                    <div class="text-center my-3">
                        <button class="btn purple-gradient btn-rounded" wire:loading.attr="disabled" wire:click.prevent="moreVideos"><i class="fas fa-arrow-circle-down"></i> Показать еще
                        </button>
                    </div>
                @endif
            </section>
            <!-- Section: Videos -->


        </div>

    </main>
    <!-- Main content -->
</div>

