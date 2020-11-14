<div>
    <div class="container mt-5">
        <!--Section: Content-->
        <section>

            <livewire:admin.upload-video-modal  :key="'modal-'.now()" />

            <h4>
                <a href="/"><i class="fas fa-home"></i> На главную</a>
            </h4>
            <h3 class="d-flex align-items-center">
                <span class="mr-auto">Управление видео</span>
                <span class="ml-auto"><a wire:click.prevent="$emit('createVideo')" class="btn btn-success btn-md mx-0 btn-rounded">Добавить видео</a></span>
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
</div>
