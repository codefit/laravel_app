<div>
    <button wire:click="increment">+</button>
    <button wire:click="decrement">-</button>
    <button wire:click="init">Init</button>
    <h1>{{ $count }}</h1>

    @if(isset($error))

    @endif
</div>
