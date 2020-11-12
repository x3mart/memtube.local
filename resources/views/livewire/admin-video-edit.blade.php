<div>
    <div class="container mt-5">
        <!--Section: Content-->
        <section>
            <div class="modal fade" id="addVideoForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header text-center">
                            <h4 class="modal-title w-100 font-weight-bold">Добавление видео</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body mx-3">
                            <form class="md-form" style="color: #757575;">
                                <div class="md-form">
                                    <input wire:model.defer="newTitle" type="text" id="form1" class="form-control">
                                    <label for="form1">Название видео</label>
                                </div>
                                <div class="file-field">
                                    <div class="btn btn-primary btn-sm float-left">
                                        <span>Выберите файл</span>
                                        <input type="file">
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path validate" type="text" placeholder="Загрузить видео">
                                    </div>
                                </div>

                                <div class="md-form">
                                    <textarea wire:model.defer="newTags" id="form7" class="md-textarea form-control" rows="3"></textarea>
                                    <label for="form7">Теги (через запятую)</label>
                                </div>

                                <button class="btn btn-outline-info btn-rounded btn-block z-depth-0 my-4 waves-effect"
                                        type="submit">Сохранить
                                </button>

                            </form>

                        </div>
                    </div>
                </div>
            </div>


            <h3 class="d-flex align-items-center">
                <span class="mr-auto">Управление видео</span>
                <span class="ml-auto"><a class="btn btn-success btn-md mx-0 btn-rounded" data-toggle="modal"
                                         data-target="#addVideoForm">Добавить видео</a></span>
            </h3>
            <hr class="mb-4">

        @forelse ($videos as $video)

            <!-- Grid row -->
            <livewire:admin.card-video :video="$video" :key="'video-'.$video->id.now()" />
            <!-- Grid row -->

            <hr class="my-4">
            @empty

            @endforelse

        </section>
        <!--Section: Content-->


    </div>
</div>
