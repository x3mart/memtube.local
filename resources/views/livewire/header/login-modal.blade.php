<div style="display:none; position: fixed; z-index: 10; top: 10%; left: 40%;" x-show.transition.500="open">
    <div class="modal-dialog cascading-modal" role="document">
        <!--Content-->
        <div class="modal-content">
            <!--Modal cascading tabs-->
            <div class="modal-c-tabs">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs md-tabs tabs-2 lighten-4" style="background-color:#140032;" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#panel7" role="tab"><i
                                class="fas fa-user mr-1"></i>
                            Вход</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#panel8" role="tab"><i
                                class="fas fa-user-plus mr-1"></i>
                            Регистрация</a>
                    </li>
                </ul>
                <!-- Tab panels -->
                <div class="tab-content">
                    <!--Panel 7-->
                    <div class="tab-pane fade in show active" id="panel7" role="tabpanel">

                        <!--Body-->
                        <div class="modal-body mb-1">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="md-form form-sm mb-5">
                                    <i class="fas fa-envelope prefix" style="color:#140032;"></i>
                                    <input name="email" type="email" id="modalLRInput10"
                                           class="form-control form-control-sm validate">
                                    <label data-error="Введите правильный email" data-success="Отлично" for="modalLRInput10">Ваш
                                        email</label>
                                </div>

                                <div class="md-form form-sm mb-4">
                                    <i class="fas fa-lock prefix" style="color:#140032;"></i>
                                    <input name="password" type="password" id="modalLRInput11"
                                           class="form-control form-control-sm validate">
                                    <label data-error="Ошибка" data-success="Отлично" for="modalLRInput11">Ваш
                                        пароль</label>
                                </div>
                                <div class="text-center mt-2">
                                    <button type="submit" class="btn purple-gradient btn-rounded"> Войти <i
                                            class="fas fa-sign-in ml-1"></i>
                                    </button>
                                </div>
                            </form>


                        </div>
                        <!--Footer-->
                        <div class="modal-footer">
                            <div class="options text-center text-md-right mt-1">
                                <p>Еще не с нами? <a data-toggle="tab" href="#panel8" style="color:#140032;"
                                                     role="tab">Регистрация</a>
                                </p>
                                <p>Забыли <a href="#" style="color:#140032;">пароль?</a></p>
                            </div>
                            <button type="button" class="btn btn-outline-info waves-effect ml-auto"
                                    data-dismiss="modal">Закрыть
                            </button>
                        </div>
                    </div>
                    <!--/.Panel 7-->
                    <!--Panel 8-->
                    <div class="tab-pane fade" id="panel8" role="tabpanel">
                        <!--Body-->
                        <div class="modal-body">
                            <form>
                                @csrf
                                <div class="md-form form-sm mb-5">
                                    <i class="fas fa-user prefix" style="color:#140032;"></i>
                                    <input wire:model.defer="name" name="name" type="text" id="modalLRInput15"
                                           class="form-control form-control-sm validate">
                                    <label  data-error="Ошибка" data-success="Отлично" for="modalLRInput15">Ваше
                                        имя</label>
                                </div>
                                <div class="md-form form-sm mb-5">
                                    <i class="fas fa-envelope prefix" style="color:#140032;"></i>
                                    <input wire:model.defer="email" name="email" type="email" id="modalLRInput12"
                                           class="form-control form-control-sm validate">
                                    <label data-error="Ошибка" data-success="Отлично" for="modalLRInput12">Ваш
                                        email</label>
                                </div>

                                <div class="md-form form-sm mb-5">
                                    <i class="fas fa-lock prefix" style="color:#140032;"></i>
                                    <input wire:model.defer="password" name="password" type="password"
                                           id="modalLRInput13"
                                           class="form-control form-control-sm validate">
                                    <label data-error="Ошибка" data-success="Отлично" for="modalLRInput13">Ваш
                                        пароль</label>
                                </div>

                                <div class="md-form form-sm mb-4">
                                    <i class="fas fa-lock prefix" style="color:#140032;"></i>
                                    <input wire:model.defer="password_confirmation" name="password_confirmation"
                                           type="password" id="modalLRInput14"
                                           class="form-control form-control-sm validate">
                                    <label data-error="Ошибка" data-success="Отлично" for="modalLRInput14">Повторите
                                        пароль</label>
                                </div>

                                <div class="text-center form-sm mt-2">
                                    <button type="submit" class="btn purple-gradient btn-rounded"
                                            wire:loading.attr="disabled" wire:click.prevent="registerUser">
                                        Регистрация <i
                                            class="fas fa-sign-in"></i>
                                    </button>
                                </div>
                            </form>


                        </div>
                        <!--Footer-->
                        <div class="modal-footer">
                            <div class="options text-right">
                                <p class="pt-1">Зарегистрированы? <a data-toggle="tab" href="#panel7" role="tab"
                                                                     style="color:#140032;">Войти</a></p>
                            </div>
                            <button type="button" class="btn btn-outline-info waves-effect ml-auto"
                                    data-dismiss="modal">Закрыть
                            </button>
                        </div>
                    </div>
                    <!--/.Panel 8-->
                </div>
            </div>
        </div>
        <!--/.Content-->
    </div>
</div>
