<div class="modal fade" id="modalUsername" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <form class="modal-content" method="POST" action="{{ route('profile.username') }}">
            @csrf
            @method('PUT')

            <div class="modal-header">
                <h5 class="modal-title">Edit Username</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <input type="text" name="name" class="form-control" value="{{ auth()->user()->name }}" required>
            </div>

            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>
