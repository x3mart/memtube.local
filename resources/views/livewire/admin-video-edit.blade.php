<div class="container">
    <div class="mb-4 active-purple-4 card" style="font-size: 2rem; margin-top: -22px;">
        <input class="form-control form-control-lg" type="text" placeholder="Поиск" id="prefixInside"
                aria-label="Search" wire:model="search">
    </div>
    <div class="mt-5">
        <!--Section: Content-->
        <section>

            <livewire:admin.upload-video-modal  :wire:key="'modal-'.now()" />

            <h4>
                <a href="/"><i class="fas fa-home"></i> На главную</a>
            </h4>
            <h3 class="d-flex align-items-center">
                <span class="mr-auto">Управление видео</span>
                <div class="ml-auto">
                    <span ><a wire:click.prevent="$emit('createVideo')" class="mx-0 btn btn-success btn-md btn-rounded">Добавить видео</a></span>
                    <span class="ml-3"><a wire:click.prevent="editSeo" class="mx-0 btn btn-success btn-md btn-rounded">Настроить SEO</a></span>
                </div>
            </h3>
            <hr class="mb-4">

            <div>
                {{-- @dd($videos) --}}
                @forelse ($videos as $video)

                <!-- Grid row -->
                <livewire:admin.card-video :video="$video" :key="'video-'.$video->id.now()" />
                <!-- Grid row -->

                <hr class="my-4">
                @empty

                @endforelse
                {{ $videos->links() }}
            </div>

        </section>
        <!--Section: Content-->
    </div>
    @if (!!$showEditSeo)
    <livewire:admin.video-seo :wire:key="now()"/>
    @endif
</div>
