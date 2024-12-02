<div class="card">
    <div class="bg-info-o-45 text-center p-2 rounded  border-top border-info">
        <h3 class="mb-0 text-info">Change password</h3>
    </div>
    <div class="card-body">
        @if (session()->has('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form wire:submit="changePassword">
            <div class="form-group">
                <label for="oldPassword">Old Password</label>
                <input type="password" class="form-control" wire:model.live="oldPassword">
                @error('oldPassword') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="newPassword">New Password</label>
                <input type="password" class="form-control" wire:model.live="newPassword">
                @error('newPassword') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="confirmPassword">Confirm New Password</label>
                <input type="password" class="form-control" wire:model.live="confirmPassword">
                @error('confirmPassword') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <button type="submit" class="btn btn-info">Change Password</button>
        </form>
    </div>
</div>

