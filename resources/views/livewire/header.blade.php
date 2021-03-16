<div class="logo-section" x-data="{ login : true, open : false, change_password : false}"  @click.away="open = false">
    <!--Modal: Login / Register Form-->
    <div style="display:none; position: fixed; z-index: 10; top: 10%; left: 40%;" x-show.transition.500="open">
        <div class="modal-dialog cascading-modal" role="document">
            <!--Content-->
            <div class="modal-content">
                <!--Modal cascading tabs-->
                <div class="modal-c-tabs">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs md-tabs tabs-2 lighten-4" style="background-color:#140032;" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link" @click="login=true" x-bind:class="{'active' : login}" data-toggle="tab" href="#panel7" role="tab"><i
                                    class="fas fa-user mr-1"></i>
                                Вход</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" @click="login=false" x-bind:class="{'active' : !login}" data-toggle="tab" href="#panel8" role="tab"><i
                                    class="fas fa-user-plus mr-1"></i>
                                Регистрация</a>
                        </li>
                    </ul>
                    <!-- Tab panels -->
                    <div class="tab-content">
                        <!--Panel 7-->
                        <div class="tab-pane fade in" x-bind:class="{'active show' : login}">

                            <!--Body-->
                            <div class="modal-body mb-1">
                                <form>
                                    @csrf
                                    <div class="md-form form-sm mb-5">
                                        <i class="fas fa-envelope prefix" style="color:#140032;"></i>
                                        <input wire:model="email" name="email" type="email" id="modalLRInput10"
                                               class="form-control form-control-sm">
                                        <label wire:ignore for="modalLRInput10">
                                            Ваш email
                                        </label>
                                        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>

                                    <div class="md-form form-sm mb-4">
                                        <i class="fas fa-lock prefix" style="color:#140032;"></i>
                                        <input wire:model="password" name="password" type="password" id="modalLRInput11" class="form-control form-control-sm">
                                        <label wire:ignore for="modalLRInput11">
                                            Ваш пароль
                                        </label>
                                        @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="text-center mt-2">
                                        <button wire:loading.attr="disabled" wire:click.prevent="authUser" type="button" class="btn purple-gradient btn-rounded"> Войти <i
                                                class="fas fa-sign-in ml-1"></i>
                                        </button>
                                    </div>
                                </form>


                            </div>
                            <!--Footer-->
                            <div class="modal-footer">
                                <p>Забыли <a href="{{ route('password.request') }}" style="color:#140032;">пароль?</a></p>
                                <button wire:loading.attr="disabled" @click.prevent="open=false" type="button" class="btn btn-outline-info waves-effect ml-auto"
                                        data-dismiss="modal">Закрыть
                                </button>
                            </div>
                        </div>
                        <!--/.Panel 7-->
                        <!--Panel 8-->
                        <div class="tab-pane fade in" x-bind:class="{'active show' : !login}">
                            <!--Body-->
                            <div class="modal-body">
                                <form>
                                    @csrf
                                    <div class="md-form form-sm mb-5">
                                        <i class="fas fa-user prefix" style="color:#140032;"></i>
                                        <input wire:model.defer="name" name="name" type="text" id="modalLRInput15"
                                               class="form-control form-control-sm">
                                        <label wire:ignore  for="modalLRInput15">Ваше
                                            имя</label>
                                            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="md-form form-sm mb-5">
                                        <i class="fas fa-envelope prefix" style="color:#140032;"></i>
                                        <input wire:model="new_email" name="email" type="email" id="modalLRInput12"
                                               class="form-control form-control-sm">
                                        <label wire:ignore for="modalLRInput12">Ваш
                                            email</label>
                                             @error('new_email') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>

                                    <div class="md-form form-sm mb-5">
                                        <i class="fas fa-lock prefix" style="color:#140032;"></i>
                                        <input wire:model="new_password" name="password" type="password"
                                               id="modalLRInput13"
                                               class="form-control form-control-sm">
                                        <label wire:ignore for="modalLRInput13">Ваш
                                            пароль</label>
                                             @error('new_password') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>

                                    <div class="md-form form-sm mb-4">
                                        <i class="fas fa-lock prefix" style="color:#140032;"></i>
                                        <input wire:model="password_confirmation" name="password_confirmation"
                                               type="password" id="modalLRInput14"
                                               class="form-control form-control-sm">
                                        <label wire:ignore for="modalLRInput14">Повторите
                                            пароль</label>
                                             @error('password_confirmation') <span class="text-danger">{{ $message }}</span> @enderror
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
                                <button type="button" @click.prevent="open=false" wire:loading.attr="disabled" class="btn btn-outline-info waves-effect ml-auto"
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
    <!--Modal: Login / Register Form-->
    {{-- modal change password --}}
    <div class="modal-dialog" role="document" style="display:none; position: fixed; z-index: 10; top: 10%; left: 40%;" x-show.transition.500="change_password" @click.away="change_password = false">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Новый пароль</h4>
                <button type="button" @click.pevent="change_password = false" class="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!--Modal cascading tabs-->
            <div class="modal-c-tabs">
                <div class="tab-pane fade in active show">
                    <!--Body-->
                    <div class="modal-body mb-1">
                        <form>
                            <div class="md-form form-sm mb-5">
                                <i class="fas fa-lock prefix" style="color:#140032;"></i>
                                <input wire:model="new_password" id="modalLRInput194" name="password" type="password" class="form-control form-control-sm">
                                <label wire:ignore for="modalLRInput194">Новый пароль</label>
                                    @error('new_password') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="md-form form-sm mb-4">
                                <i class="fas fa-lock prefix" style="color:#140032;"></i>
                                <input wire:model="password_confirmation" name="password_confirmation" id="modalLRInput193" type="password" class="form-control form-control-sm">
                                <label wire:ignore for="modalLRInput193">Повторите пароль</label>
                                    @error('password_confirmation') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="text-center mt-2">
                                <button wire:loading.attr="disabled" wire:click.prevent="changePassword" type="submit" class="btn purple-gradient btn-rounded"> Изменить <i
                                        class="fas fa-sign-in ml-1"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">MemTube</a>
            <div class="navbar-nav nav-flex-icons">
                <ul class="navbar-nav ml-auto nav-flex-icons">
                    <li class="nav-item">
                        <a href="https://www.instagram.com/mariia.nibiru/" target="_blank" class="nav-link">@mariia.nibiru <i class="fab fa-instagram"></i></a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-5">
                    @guest
                        <li class="nav-item">
                            <a href="" @click="open=true" class="nav-link" data-toggle="modal"
                               data-target="#modalLRForm"><i class="fas fa-user"></i>&ensp;Войти</a>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">

                                <i class="fas fa-user"></i>&ensp;
                                @if ($user->isAdmin)
                                    Admin
                                @else
                                    {{ $user->name }}
                                @endif
                            </a>
                            <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                                @if ($user->isAdmin)
                                    <a href="{{ route('admin') }}" class="collapsible-header waves-effect"><i
                                            class="fas fa-film"></i> Управление видео</a>
                                @endif
                                   <a href="" @click.prevent="change_password=true"class="collapsible-header waves-effect"><i
                                           class="fas fa-lock"></i> Сменить пароль</a>
                                    <a href="#" wire:click.prevent="logoutUser" class="collapsible-header waves-effect"><i class="fas fa-sign-out-alt"></i> Выход</a>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

<!-- Intro Section -->
    <div id="home" class="logo-component">
        <div class='organism'>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
        </div>
        <div class='organism'>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
            <div class='atom'></div>
        </div>
        <a class="navbar-brand" href="{{ url('/') }}">
            <div class="memtube-logo">
                <div style="
                        top: 80%;
                        left: calc(50% - 100px);
                        width: 200px;
                        height: 24px;
                        margin: 0;
                        color: white;
                        font-size: 17px;
                        font-weight: 800;
                        text-align: center;">
                    {{ $videocount }} видео
                </div>
            </div>
        </a>

    </div>
    <!--/. Intro Section -->
</div>

