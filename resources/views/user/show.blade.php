<x-app-layout>
    <div class="border-b -mt-8 py-16">
        <x-container>
            <div class="flex">
                <div class=" flex-shrink-0 mr-3 ">
                    <img class="w-20 h-20 rounded-full border-2 border-blue-500 ring-2 p-1" src="{{ $user->gravatar() }}"
                        alt="{{ $user->name }}">
                </div>
                <div>
                    <h1 class="font-semibold">{{ $user->name }}</h1>
                    <p class="text-sm text-gray-500">Joined: {{ $user->created_at->diffForhumans() }}</p>
                </div>
            </div>
        </x-container>
    </div>
    <div class="border-b">
        <x-container>
            <x-statistic :user="$user" />
        </x-container>
    </div>
    <x-container>
        <div class="grid-cols-2 mt-5">
            <div class="space-y-5">
                <x-statuses :statuses="$statuses" />
            </div>
        </div>
    </x-container>
</x-app-layout>
