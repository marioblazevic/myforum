<div class="container">
    <form method="POST" action="{{ route('posts') }}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('POST')
        <div class="form-group">
            <label for="exampleFormControlInput1">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
            @error('title')
                <p style="color:red">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Body</label>
            <textarea class="form-control" id="body" name="body" rows="3">{{ old('body') }}</textarea>
            @error('body')
                <p style="color:red">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleFormControlFile1">Example file input</label>
            <input type="file" class="form-control-file" id="picture_path" name="picture_path">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>