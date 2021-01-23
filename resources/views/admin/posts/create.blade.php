<div class="modal fade" id="modal-create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form method="POST" action="{{ route('admin.posts.store') }}">
        @csrf
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{__("Title post") }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    {{-- <label for="title">{{__("Title post") }}</label> --}}
                    <input type="title"
                        class="form-control @error('title') is-invalid @else '' @enderror"
                        name="title"
                        id="title"
                        value="{{ old('title') }}"
                        placeholder="{{ __("Enter title") }}"
                        required
                    >
                    {{-- {!! $errors->first('title', '<span class="help-group">:message</span>') !!} --}}
                    @error('title')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
    </form>
</div>
