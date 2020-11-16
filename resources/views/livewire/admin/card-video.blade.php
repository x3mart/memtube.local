<div class="row align-items-center dark-grey-text">

    <!-- Grid column -->
    <div class="col-sm-4 col-xl-3">

        <!-- Featured image -->
        <div class="view overlay rounded z-depth-1-half mb-lg-0 mb-4">
            <video
                id="my-video-{{ $video->id }}"
                class="video-js"
                controls
                preload="metadata"
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

    </div>
    <!-- Grid column -->

    <!-- Grid column -->
    <div class="col-sm-8 col-xl-9">

        <!-- Post title -->
        @if (!!$titleEdit)
            <input wire:model.defer="title" type="text" id="form1" class="form-control mb-2 "> <a href="#" wire:click.prevent="saveTitle" class="text-success"><i class="fas fa-check-double"></i> Сохранить</a>
        @else
            <h4 class="font-weight-bold mb-0"><strong>{{ Str::ucfirst($video->title) }} <a href="#" wire:click.prevent="editTitle" class="text-primary font-weight-normal ml-3"><i class="fas fa-edit"></i> Изменить название</a></strong></h4>
        @endif
        <!-- Excerpt -->
        <p class="black-text mb-0">Тэги:</p>
        <p class="dark-grey-text">
            @forelse ($video->tags as $tag)
                #{{ $tag->tag }}<a href="#" wire:click.prevent="deleteTag({{$tag->id}})" class="text-danger"><i class="fas fa-trash"></i></a>&nbsp;
            @empty
                Тэгов нет!
            @endforelse
            @if (!!$addTags)
                <input wire:model.defer="tags" type="text" id="form1" class="form-control mb-2 "> <a href="#" wire:click.prevent="addTags" class="text-success"><i class="fas fa-check-double"></i> Добавить</a>
            @else
                <a href="#" wire:click.prevent="$set('addTags', true)" class="text-success ml-3"><i class="fas fa-plus-square"></i> Добавить тэги!</a>
            @endif
        </p>
        <!-- Read more button -->
        {{-- <a class="btn btn-primary btn-md mx-0 btn-rounded">Редактировать</a> --}}
        <a wire:click.prevent="deleteVideo" class="btn btn-danger btn-md mx-0 btn-rounded">Удалить видео</a>

    </div>
    <!-- Grid column -->

</div>
