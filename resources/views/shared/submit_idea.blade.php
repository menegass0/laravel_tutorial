<h4> Share yours ideas </h4>
<div class="row">
    <form action="{{ route('ideas.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <textarea name="idea-content" class="form-control" id="idea" rows="3"></textarea>
            @error('idea-content')
                <span class="fs-6 text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="">
            <button type="submit" class="btn btn-dark"> Share </button>
        </div>
    </form>
</div>