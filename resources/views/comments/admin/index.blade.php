<x-layouts.base title="All comments">
    @foreach($comments as $comment)
        <div class="alert alert-danger">
            <div>
                {{ $comment->created_at }}
            </div>
            <div>
                {{ $comment->text }}
            </div>
            <div>
                {{ $comment->post->title }}
            </div>
            <div>
                {{ $comment->post->category->title }}
            </div>
            
            <a href="{{ route('posts.show', [ $comment->post->id ]) }}">
                Go to post
            </a>            
        </div>
    @endforeach
</x-layouts.base>