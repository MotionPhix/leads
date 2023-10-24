<div
    wire:ignore
    x-data=""
    x-init="
        const editor = new Jodit($refs.editor);
        editor.value = @this.get('{{ $attributes['wire:model'] }}');
        editor.events.on('change', () => {
            @this.set('{{ $attributes['wire:model'] }}', editor.value);
        });
    "
    class="w-full h-full"
>
    <textarea x-ref="editor" id="editor" name="{{ $attributes['wire:model'] }}"></textarea>
</div>
