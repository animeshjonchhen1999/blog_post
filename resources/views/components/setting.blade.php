@props(['heading'])
<section class="mx-auto max-w-4xl py-8">
    <h1 class="font-bold text-lg mb-8 pb-2 border-b">
        {{ $heading }}
    </h1>

    <div class="flex mt-5">
        <aside class="w-48">
            <h4 class="mb-4 font-semibold">Links</h4>
            <ul>
                <li> <a href="/admin/posts/create" class="{{ request()->is('admin/posts/create') ? 'text-blue-500' : '' }} "> Create New Post</a></li>
                <li> <a href="/admin/posts" class="{{ request()->is('admin/posts') ? 'text-blue-500' : '' }} "> All Posts</a></li>
            </ul>
        </aside>
    
        <main class="flex-1">
            <div class="max-w-lg mx-auto mt-10 bg-grey-300 border border-grey-500 p-6 rounded-xl">
                {{ $slot }}
            </div>
        </main>
    </div>
</section>