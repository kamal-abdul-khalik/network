<x-app-layout>
    <x-container>
        <div class="grid md:grid-cols-3 sm:grid-cols-2 xl:grid-cols-4 gap-5">
            <x-following :users="$users" />
        </div>

        <div class="mt-6">
            {{ $users->links() }}
        </div>
    </x-container>
</x-app-layout>
