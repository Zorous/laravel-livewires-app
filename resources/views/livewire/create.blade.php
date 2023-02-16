<div>
    <form>

        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" wire:model="name" placeholder="Enter the name">
          @error('name') <span class="text-danger">{{ $message }}</span>@enderror

        </div>

        <div class="form-group">
          <label for="description">Description</label>
          <input type="text" class="form-control @error('name') is-invalid @enderror" name="description" wire:model="description" id="description" placeholder="Enter Description">
          @error('description') <span class="text-danger">{{ $message }}</span>@enderror
        </div>

        <button wire:click.prevent="store()" class="btn btn-success btn-block">+ Add</button>
      </form>
</div>
