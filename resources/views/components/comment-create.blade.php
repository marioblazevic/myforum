<div class="comment-create mt-3">
            <form method="POST" action="{{ route('create-comment', $post) }}">
            @csrf
            @method('POST')
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Leave comment</label>
                    <textarea class="form-control" id="body" name="body" rows="3"></textarea>
                </div>
                <button class="btn btn-primary" type="submit">Comment</button>
            </form>
        </div>