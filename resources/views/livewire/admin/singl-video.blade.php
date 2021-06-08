<div style="position: fixed;top: 0;left: 0;z-index: 1050;width: 100%;height: 100%;overflow: hidden;outline: 0;" role="dialog">
    <div class="modal-dialog" role="document"  style="max-width:800px;">
        <form wire:submit.prevent="savePage" class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">{{ $video->title }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span wire:click.prevent="endEditPage" aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body" wire:ignore>
                <input wire:model.defer='page_seo.title' type="text" class="form-control" placeholder="meta:title" aria-label="meta:title" aria-describedby="basic-addon1">
                <input wire:model.defer='page_seo.keywords'type="text" class="form-control" placeholder="meta:keywords" aria-label="meta:keywords" aria-describedby="basic-addon1">
                <input wire:model.defer='page_seo.description'type="text" class="form-control" placeholder="meta:description" aria-label="meta:description" aria-describedby="basic-addon1">
                <input wire:model.defer='page.title'type="text" class="form-control" placeholder="page:title" aria-label="page:title" aria-describedby="basic-addon1">
                @error('name') <span class="error">{{ $message }}</span> @enderror
                <div id="summernote-{{ $video->id }}">{!! $page->body !!}</div>
            </div>
            <div class="modal-footer">
            <button type="submit"  wire:loading.attr="disabled" wire:target="savePage" class="btn btn-primary">Save changes</button>
            <button type="button" wire:click.prevent="endEditPage" class="btn btn-secondary" wire:loading.attr="disabled" wire:target="savePage" data-dismiss="modal">Close</button>
            </div>
        </form>
    </div>
    <script>
        const editor = $(`#summernote-{{ $video->id }}`),
        config = {
            lang: 'ru-RU',
            shortcuts: false,
            airMode: false,
            focus: false,
            disableDragAndDrop: false,
            heigth: '70%',
            callbacks: {
                onImageUpload: function (files) {
                    @this.upload('photo', files[0], (image) => {
                        @this.savePhoto()
                        @this.on('photoSaved', (image) => {
                            editor.summernote('insertImage', '/' + image, function ($image) {
                                $image.css('width', '100%');
                            });
                        })
                    }, () => {
                        swal("Беда!", "Грузите что то большое или неправильное" , "error");
                    })
                },
                onMediaDelete: function ($target) {
                    const url = $target[0].src,
                        cut = `${document.location.origin}/`,
                        image = url.replace(cut, '');
                    @this.deletePhoto(image);
                },
                onChange: function(contents, $editable) {
                    @this.set('page.body',contents);
                }
            }
        };
        editor.summernote(config);
    </script>
</div>
