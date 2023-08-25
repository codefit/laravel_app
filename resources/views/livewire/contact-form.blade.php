<div>
    <form wire:submit.prevent="submit">
        <div class="form-group">
            <input type="text" wire:model="name">
            @error('name') <div class="alert alert-danger"><strong>{{ $message }}</strong></div> @enderror
        </div>
        <div class="form-group">
            <input type="text" wire:model="email">
            @error('email') <div class="alert alert-danger"><strong>{{ $message }}</strong></div> @enderror
        </div>
        <button type="submit">Save Contact</button>
    </form>
</div>
