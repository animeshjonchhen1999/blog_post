<x-layout>
    <x-setting heading="Create New Post">
        <form action="/admin/posts" enctype="multipart/form-data" method="POST">
            @csrf

            <x-form.input name='title' />

            <x-form.input name='slug' />

            <x-form.input name='excerpt' />

            <x-form.input type="file" name='thumbnail' />

            <x-form.textarea name='body' />

            <x-form.field>
                <x-form.label name="category" />
                <select name="category_id" id="category_id">
                    @foreach (\App\Models\Category::all() as $category)
                        <option value="{{$category->id}}"
                            {{ old('category_id') == $category->id ? 'selected' : '' }}
                            >{{ ucwords($category->name)}} 
                        </option>                            
                    @endforeach
                </select>
            </x-form.field>

            <x-form.field>
                <x-form.button> Publish </x-form.button>
            </x-form.field>
        </form>
    </x-setting>
</x-layout>