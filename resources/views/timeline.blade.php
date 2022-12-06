<x-app-layout>
    <x-container class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-12 gap-6">
            <div class="col-span-8">

                <!-- Status Form -->
                <x-card>
                    <form action="{{ route('statuses.store') }}" method="POST">
                        @csrf
                        <div class="flex">
                            <div class="flex-shrink-0 mr-3">
                                <img class="w-10 h-10 rounded-full" src="{{ Auth::user()->gravatar() }}"
                                    alt="{{ Auth::user()->name }}">
                            </div>
                            <div class="w-full">
                                <div class="font-semibold">
                                    {{ Auth::user()->name }}
                                </div>
                                <div class="my-2">
                                    <textarea name="body" id="body" placeholder="What is on your mind?"
                                        class="form-textarea w-full border-gray-300 rounded-xl resize-none focus:border-blue-500 focus:ring focus:ring-blue-200 transation duration-200 "></textarea>
                                    <x-input-error :messages="$errors->get('body')" class="mt-2" />
                                </div>
                                <div class="text-right">
                                    <x-primary-button>Post</x-primary-button>
                                </div>
                            </div>
                        </div>
                    </form>
                </x-card>

                <!-- Status-->
                <div class="space-y-6 mt-5">
                    <div class=" space-y-5">
                        <x-statuses :statuses="$statuses"></x-statuses>
                    </div>
                </div>
            </div>

            <!-- Recently Follows-->
            <div class="col-span-4">
                <x-card>
                    <h1 class="font-semibold mb-5">Recently Follows</h1>
                    <div class="space-y-5">
                        <x-following :users="Auth::user()
                            ->follows()
                            ->limit(5)
                            ->get()" />
                    </div>
                </x-card>
            </div>
        </div>
    </x-container>
</x-app-layout>
