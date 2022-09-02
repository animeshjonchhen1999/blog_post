<x-layout>
    @include('posts.search-bar')

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">

        @if ($posts->count())

            <x-posts-grid :posts="$posts" />

            {{$posts->links() }}

        @else
            
            <div class="text-center">There are no posts to display.</div>

        @endif

    </main>

</x-layout>