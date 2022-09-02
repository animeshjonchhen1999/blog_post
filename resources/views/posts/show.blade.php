<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
            <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">
                <div class="col-span-4 lg:text-center lg:pt-14 mb-10">
                    <img src="{{ asset('/storage/' . $post->thumbnail) }} " alt="" class="rounded-xl">

                    <p class="mt-4 block text-gray-400 text-xs">
                        Published <time>{{ $post->created_at->diffForHumans() }} </time>
                    </p>

                    <div class="flex items-center lg:justify-center text-sm mt-4">
                        <img src="/images/lary-avatar.svg" alt="Lary avatar">
                        <div class="ml-3 text-left">
                            <a href="/?author={{ $post->author->username }} ">
                                <h5 class="font-bold">{{ $post->author->name }} </h5>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-span-8">
                    <div class="hidden lg:flex justify-between mb-6">
                        <a href="/"
                            class="transition-colors duration-300 relative inline-flex items-center text-lg hover:text-blue-500">
                            <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
                                <g fill="none" fill-rule="evenodd">
                                    <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                                    </path>
                                    <path class="fill-current"
                                        d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                                    </path>
                                </g>
                            </svg>

                            Back to Posts
                        </a>

                        <div class="space-x-2">
                            <a href="/?category={{ $post->category->slug }} " {{-- href="{{ route('/', ['category' => $post->category->slug]) }}" --}}
                                class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold"
                                style="font-size: 10px">{{ $post->category->name }} </a>
                        </div>
                    </div>

                    <h1 class="font-bold text-3xl lg:text-4xl mb-10">
                        {{ $post->title }}
                    </h1>

                    <div class="space-y-4 lg:text-lg leading-loose">
                        {{ $post->body }}
                    </div>
                </div>
                <section class="col-span-8 col-start-5 mt-10 space-y-6">
                    <div class="flex">
                        @auth
                            <form action="/admin/posts/{{ $post->id }}/likes" method='POST'>
                                @csrf
                                <x-form.button> Like </x-form.button>
                            </form>

                            <form action="/admin/posts/{{ $post->id }}/unlikes" method='POST' class="ml-5">
                                @csrf
                                <x-form.button> Unlike </x-form.button>
                            </form>
                        @endauth
                        <p class="font-semibold ml-5">
                            {{-- <livewire:show-posts /> --}}
                            {{ $post->likes()->where('type','like')->count() }} {{ Str::plural('like', $post->likes->count()) }}
                        </p>
                        <p class="font-semibold ml-5">
                            {{ $post->likes()->where('type','unlike')->count() }} {{ Str::plural('unlike', $post->likes->count()) }}
                        </p>
                    </div>

                    @auth
                        <form action="/posts/{{ $post->slug }}/comment" method="POST">
                            @csrf
                            <header class="flex mb-5">
                                <img src="https://i.pravatar.cc/150?u={{ auth()->id() }}" alt="" width="40"
                                    height="40" class="rounded">

                                <h2 class="ml-4">Want to Participate?</h2>
                            </header>

                            <x-form.textarea name='body' />

                            <x-form.button> Post </x-form.button>
                        </form>
                    @else
                        <p class="">
                            <a href="/register" class="hover:bg-blue-500">Register</a> Or <a href="/login"
                                class="hover:bg-blue-500">Login</a> To Comment
                        </p>
                    @endauth

                    @foreach ($post->comments as $comment)
                        <x-post-comment :comment="$comment" />
                    @endforeach
                </section>
            </article>
        </main>
    </section>

</x-layout>
