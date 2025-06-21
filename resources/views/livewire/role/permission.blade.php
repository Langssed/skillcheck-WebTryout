<div wire:ignore.self class="modal fade" id="permissionModal" tabindex="-1" aria-labelledby="permissionModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="permissionModalLabel"><i class="fas fa-check-square mr-1"></i>Give Permission</h4>
        </div>
        <div class="modal-body">
          <div class="row mb-3">
                <input type="text" wire:model="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Masukkan name" disabled>
          </div>
          @foreach ($permissions as $permission)
            <div class="form-check mt-1">
              <input
                class="form-check-input"
                type="checkbox"
                id="perm_{{ $permission->id }}"
                wire:model="permissionSelected"
                value="{{ $permission->name }}"
              >
              <label class="form-check-label" for="perm_{{ $permission->id }}">
                {{ $permission->name }}
              </label>
            </div>
          @endforeach
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times mr-1"></i>Tutup</button>
            <button wire:click="givePermission({{ $role_id }})" type="button" class="btn btn-success"><i class="fas fa-check-square mr-1"></i>Give</button>
        </div>
    </div>
  </div>
</div>