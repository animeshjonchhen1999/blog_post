<x-layout>
    <x-setting heading="Manage Post">
        <div class="border-b border-grey-200 sm:rounded-lg overflow-hidden shadow">
            <table class="min-w-full divide-y divide-grey-200">
                @foreach ($posts as $post)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 dark:text-white text-center whitespace-nowrap">
                            <a href="/posts/{{ $post->slug }} ">{{ $post->title }}</a>
                        </th>

                        <td class="px-6 py-4 text-center">
                            <a href="/admin/posts/{{ $post->id }}/edit"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                        </td>
                        
                        <td class="px-6 py-4 text-center">
                           <form action="/admin/posts/{{ $post->id }}" method="POST">
                            @csrf
                            @method("DELETE")

                                <button class="font-medium text-red-600 dark:text-red-500 hover:underline">Delete</button>
                           </form>
                        </td>

                    </tr>
                @endforeach
            </table>
        </div>
    </x-setting>
</x-layout>
