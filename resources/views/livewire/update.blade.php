<form>

    <div class="form-group mb-3">
      <label for="name">Name</label>
      <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" wire:model="name" placeholder="Enter the name">
      @error('name') <span class="text-danger">{{ $message }}</span>@enderror

    </div>

    <div class="form-group">
      <label for="description">Description</label>
      <input type="text" class="form-control @error('name') is-invalid @enderror" name="description" wire:model="description" id="description" placeholder="Enter Description">
      @error('description') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
<div class="d-grid gap-2">
<button wire:click.prevent="update()" class="btn btn-success btn-block">Save</button>
<button wire:click.prevent="cancel()" class="btn btn-danger btn-block">Cancel</button>
</div>
  </form>
