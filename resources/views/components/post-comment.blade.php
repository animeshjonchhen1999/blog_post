@props(['comment'])
<article class="flex bg-grey-100 border border-grey-500 p-6 rounded-xl space-x-4">
    <div class="flex-shrink-0">
        <img src="https://i.pravatar.cc/150?u={{ $comment->user_id }}" alt="" class="rounded-xl" width="60" height="60">
    </div>

    <div>
        <header class="mb-4">
            <h3 class="font-bold">{{ $comment->author->username }} </h3>

            <p class="text-sm">
                Published <time>{{ $comment->created_at->diffForHumans() }} </time>
            </p>
        </header>
        <p>
            {{ $comment->body }}
        </p>
    </div>
</article>