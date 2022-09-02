<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-grey-300 border border-grey-500 p-6 rounded-xl">

            <h1 class="text-center font-bold text-xl">Login!</h1>
            <form action="/login" method="POST" class="mt-10">
                @csrf

                <x-form.input name="email" type="email" />

                <x-form.input name="password" type="password" />

                <x-form.button>
                    Login
                </x-form.button>

            </form>
        
        </main>
    </section>
</x-layout>