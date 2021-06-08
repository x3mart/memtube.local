<div style="position: fixed;top: 0;left: 0;z-index: 1050;width: 100%;height: 100%;overflow: hidden;outline: 0;" role="dialog">
    <div class="modal-dialog" role="document">
        <form wire:submit.prevent="saveSeo" class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">Главная страница</h5>
            <button type="button" wire:click.prevent="cancelEditSeo" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <input wire:model.defer='meta.title' type="text" class="form-control" placeholder="meta:title" aria-label="meta:title" aria-describedby="basic-addon1">
                <input wire:model.defer='meta.keywords'type="text" class="form-control" placeholder="meta:keywords" aria-label="meta:keywords" aria-describedby="basic-addon1">
                <input wire:model.defer='meta.description'type="text" class="form-control" placeholder="meta:description" aria-label="meta:description" aria-describedby="basic-addon1">
            </div>
            <div class="modal-footer">
            <button type="submit"  wire:loading.attr="disabled" wire:target="saveSeo" class="btn btn-primary">Save changes</button>
            <button type="button" wire:click.prevent="cancelEditSeo" class="btn btn-secondary" wire:loading.attr="disabled" wire:target="saveSeo">Close</button>
            </div>
        </form>
    </div>
</div>
