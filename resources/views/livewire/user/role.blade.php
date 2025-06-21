<div wire:ignore.self class="modal fade" id="roleModal" tabindex="-1" aria-labelledby="roleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="roleModalLabel"><i class="fas fa-lock mr-1"></i>Assign role</h4>
        </div>
        <div class="modal-body">
          <div class="row mb-3">
                <input type="text" wire:model="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Masukkan name" disabled>
          </div>
          @foreach ($roles as $role)
            <div class="form-check mt-1">
              <input
                class="form-check-input"
                type="checkbox"
                id="perm_{{ $role->id }}"
                wire:model="roleSelected"
                value="{{ $role->name }}"
              >
              <label class="form-check-label" for="perm_{{ $role->id }}">
                {{ $role->name }}
              </label>
            </div>
          @endforeach
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times mr-1"></i>Tutup</button>
            <button wire:click="assignRole({{ $user_id }})" type="button" class="btn btn-success"><i class="fas fa-lock mr-1"></i>Assign</button>
        </div>
    </div>
  </div>
</div>