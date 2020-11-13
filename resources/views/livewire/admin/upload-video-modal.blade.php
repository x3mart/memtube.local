<div x-data="{'showModal': @entangle('showModal')}" @click.away="showModal = false" style="display:none; position: fixed; z-index: 10; top: 40%; left 40%;" x-show.transition.500="showModal">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header text-center">
                            <h4 class="modal-title w-100 font-weight-bold">Добавление видео</h4>
                            <button type="button" wire:click.pevent="$set('showModal', false)" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body mx-3">
                            <form class="md-form" style="color: #757575;" wire:submit.prevent="saveNewVideo">
                                <div class="md-form">
                                    <input wire:model.defer="title" type="text" id="form1" class="form-control">
                                    <label wire:ignore for="form1">Название видео</label>
                                </div>
                                @error('title') <span class="error">{{ $message }}</span> @enderror
                                <div class="file-field">
                                    <div class="btn btn-primary btn-sm float-left">
                                        <span>Выберите файл</span>
                                        <input wire:model.defer="video"  type="file">
                                    </div>
                                    <div wire:ignore class="file-path-wrapper">
                                        <input  class="file-path validate" type="text" placeholder="Загрузить видео">
                                    </div>
                                </div>
                                @error('video') <span class="error">{{ $message }}</span> @enderror
                                <div class="md-form">
                                    <textarea wire:model.defer="tags" id="form7" class="md-textarea form-control" rows="3"></textarea>
                                    <label wire:ignore for="form7">Теги (через пробел без #)</label>
                                </div>

                                <button wire:loading.attr="disabled" class="btn btn-outline-info btn-rounded btn-block z-depth-0 my-4 waves-effect"
                                        type="submit">Сохранить
                                </button>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
