@props(['trigger'])

<div x-data="{ show: false }" class="relative">
    {{-- Trigger--}}
    
    <div @click="show=!show" @click.away ="show = false">
        {{ $trigger }}
    </div>
    

    {{-- Links--}}
    
    <div x-show="show" class="py-3 bg-gray-100 mt-2 w-full absolute rounded" style="display: none">

        {{ ($slot) }}

    </div>

</div>