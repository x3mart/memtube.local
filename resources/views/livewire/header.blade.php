<div class="logo-section">
    <!--Modal: Login / Register Form-->
    <div class="modal fade" id="modalLRForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                                    <input type="email" name="email" id="modalLRInput10" class="form-control form-control-sm validate">
                                    <label data-error="wrong" data-success="right" for="modalLRInput10">Ваш email</label>
                                </div>

                                <div class="md-form form-sm mb-4">
                                    <i class="fas fa-lock prefix" style="color:#140032;"></i>
                                    <input type="password" id="modalLRInput11" name="password"
                                           class="form-control form-control-sm validate">
                                    <label data-error="wrong" data-success="right" for="modalLRInput11">Ваш пароль</label>
                                </div>
                                <div class="text-center mt-2">
                                <button type="submit" class="btn purple-gradient btn-rounded"> Войти <i class="fas fa-sign-in ml-1"></i>
                        </button>
                        </form>

                                </div>
                            </div>
                            <!--Footer-->
                            <div class="modal-footer">
                                <div class="options text-center text-md-right mt-1">
                                    <p>Еще не с нами? <a data-toggle="tab" href="#panel8" style="color:#140032;" role="tab">Регистрация</a>
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
                                <div class="md-form form-sm mb-5">
                                    <i class="fas fa-envelope prefix" style="color:#140032;"></i>
                                    <input type="email" id="modalLRInput12" class="form-control form-control-sm validate">
                                    <label data-error="wrong" data-success="right" for="modalLRInput12">Ваш email</label>
                                </div>

                                <div class="md-form form-sm mb-5">
                                    <i class="fas fa-lock prefix" style="color:#140032;"></i>
                                    <input type="password" id="modalLRInput13"
                                           class="form-control form-control-sm validate">
                                    <label data-error="wrong" data-success="right" for="modalLRInput13">Ваш пароль</label>
                                </div>

                                <div class="md-form form-sm mb-4">
                                    <i class="fas fa-lock prefix" style="color:#140032;"></i>
                                    <input type="password" id="modalLRInput14"
                                           class="form-control form-control-sm validate">
                                    <label data-error="wrong" data-success="right" for="modalLRInput14">Повторите
                                        пароль</label>
                                </div>

                                <div class="text-center form-sm mt-2">
                                    <button type="submit" class="btn purple-gradient btn-rounded"> Регистрация <i class="fas fa-sign-in"></i>
                        </button>
              </form>
                                </div>

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
    <!--Modal: Login / Register Form-->

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">MemTube</a>

            <div class="navbar-nav nav-flex-icons">
                <ul class="navbar-nav ml-auto nav-flex-icons">
                    <li class="nav-item">
                        <a href="facebook.com" class="nav-link"><i class="fab fa-facebook-f"></i></a>
                    </li>
                    <li class="nav-item">
                        <a href="vk.ru" class="nav-link"><i class="fab fa-vk"></i></a>
                    </li>
                    <li class="nav-item">
                        <a href="instagram.com" class="nav-link"><i class="fab fa-instagram"></i></a>
                    </li>
                    @guest
                    <li class="nav-item">
                        <a href="" class="btn btn-outline-light btn-rounded waves-effect my-3" data-toggle="modal"
                           data-target="#modalLRForm">Войти</a>
                    </li>
                    @else

                    <li class="nav-item">
                        @if ($user->isAdmin)
                        Admin
                        @else
                        {{ $user->name }}
                        @endif
                    </li>
                    <li class="nav-item">
                        <a href="#" data-activates="slide-out" class="button-collapse"><i class="fas fa-bars"></i></a>
                    </li>

                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    @auth
    <!-- Sidebar navigation -->
    <div id="slide-out" class="side-nav">
        <ul class="custom-scrollbar">
            <!-- Greeting -->
            <li>
                <div class="sidebar-greeting" style="padding:20px;border-bottom:1px solid rgba(153, 153, 153, 0.3);">Добро
                    пожаловать, <br>
                    @if ($user->isAdmin)
                    Admin
                    @else
                    {{ $user->name }}
                    @endif
                </div>
            </li>
            <!--/. Greeting -->
            <!-- Side navigation links -->
            <li>
                <ul class="collapsible collapsible-accordion">
                    <li>
                        <a href="#" class="collapsible-header waves-effect"><i
                                class="fas fa-star"></i> Избранные</a>
                    </li>
                    <li>
                        <a href="#" class="collapsible-header waves-effect"><i
                                class="fas fa-download"></i> Скачанные</a>
                    </li>
                    @if ($user->isAdmin)
                    <li>
                        <a href="#" class="collapsible-header waves-effect"><i
                                class="fas fa-film"></i> Управление видео</a>
                    </li>
                    @endif
                    <li>
                        <a href="#" class="collapsible-header waves-effect"><i
                                class="fas fa-lock"></i> Сменить пароль</a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}" class="collapsible-header waves-effect"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                                class="fas fa-sign-out-alt"></i> Выход</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </li>
            <!--/. Side navigation links -->
        </ul>
        <div class="sidenav-bg mask-strong"></div>
    </div>
    <!--/. Sidebar navigation -->
    @endauth

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
            <div class="memtube-logo"></div>
        </a>

    </div>
    <!--/. Intro Section -->
</div>

