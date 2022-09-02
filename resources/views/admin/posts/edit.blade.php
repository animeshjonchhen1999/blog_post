<x-layout>
    <x-setting :heading=" 'Edit Post: '  . $post->title">
        <form action="/admin/posts/{{ $post->id }} " enctype="multipart/form-data" method="POST">
            @csrf

            @method('PATCH')

            <x-form.input name='title' :value="old('title',$post->title)" />

            <x-form.input name='slug' :value="old('slug',$post->slug)"/>

            <x-form.input name='excerpt' :value="old('excerpt',$post->excerpt) "/>

            <div class="mt-5 flex">
                <div class="flex-1">
                    <x-form.input type="file" name='thumbnail' />
                </div>

                <img src="{{asset('/storage/'.$post->thumbnail)}} " width="100" class="ml-6">
            </div>

            <x-form.textarea name='body'> {{ old('body',$post->body) }} </x-form.textarea>

            <x-form.field>
                <x-form.label name="category" />
                <select name="category_id" id="category_id">
                    @foreach (\App\Models\Category::all() as $category)
                        <option value="{{$category->id}}"
                            {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}
                            >{{ ucwords($category->name)}} 
                        </option>                            
                    @endforeach
                </select>
            </x-form.field>

            <x-form.field>
                <x-form.button> Update </x-form.button>
            </x-form.field>
        </form>
    </x-setting>
</x-layout>