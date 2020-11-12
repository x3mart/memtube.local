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
                                    <input type="text" id="form1" class="form-control">
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
                                    <textarea id="form7" class="md-textarea form-control" rows="3"></textarea>
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
                                         data-target="#addVideoForm">Добавить</a></span>
            </h3>
            <hr class="mb-4">

        @forelse ($videos as $item)

            <!-- Grid row -->
            <div class="row align-items-center dark-grey-text">

                <!-- Grid column -->
                <div class="col-sm-4 col-xl-3">

                    <!-- Featured image -->
                    <div class="view overlay rounded z-depth-1-half mb-lg-0 mb-4">
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

                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-sm-8 col-xl-9">

                    <!-- Post title -->
                    <h4 class="font-weight-bold mb-0"><strong>Название видео</strong></h4>
                    <!-- Excerpt -->
                    <p class="black-text mb-0">Теги:</p>
                    <p class="dark-grey-text">тег</p>
                    <!-- Read more button -->
                    <a class="btn btn-primary btn-md mx-0 btn-rounded">Редактировать</a>
                    <a class="btn btn-danger btn-md mx-0 btn-rounded">Удалить</a>

                </div>
                <!-- Grid column -->

            </div>
            <!-- Grid row -->

            <hr class="my-4">

            @endforelse

        </section>
        <!--Section: Content-->


    </div>
</div>
