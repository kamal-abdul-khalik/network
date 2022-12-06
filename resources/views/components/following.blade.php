@foreach ($users as $user)
    <x-card>
        <div class="flex items-center">
            <div class="flex-shrink-0 mr-3">
                <img class="w-10 h-10 rounded-full" src="{{ $user->gravatar() }}" alt="{{ $user->name }}">
            </div>
            <div class="font-semibold">
                <a href="{{ route('profile.user', $user->username) }}">{{ $user->name }}</a>
            </div>
            <div class="flex text-sm text-gray-500 justify-between">
                @if (Auth::user()->pivot)
                    {{ $user->pivot->created_at->diffForHumans() }}
                @endif
            </div>
        </div>
        <div class="flex items-center justify-end ">
            @if (request()->routeIs('users.index'))
                <div class=" mt-8">
                    @if (Auth::user()->isNot($user))
                        <form action="{{ route('following.store', $user) }}" method="post">
                            @csrf
                            <x-primary-button>
                                @if (Auth::user()->follows()->where('following_user_id', $user->id)->first())
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="w-5 h-5 text-red-400 bg-white rounded-full p-1">
                                        <path
                                            d="M10.375 2.25a4.125 4.125 0 100 8.25 4.125 4.125 0 000-8.25zM10.375 12a7.125 7.125 0 00-7.124 7.247.75.75 0 00.363.63 13.067 13.067 0 006.761 1.873c2.472 0 4.786-.684 6.76-1.873a.75.75 0 00.364-.63l.001-.12v-.002A7.125 7.125 0 0010.375 12zM16 9.75a.75.75 0 000 1.5h6a.75.75 0 000-1.5h-6z" />
                                    </svg>
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="w-5 h-5 text-green-500 bg-white rounded-full p-1">
                                        <path
                                            d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z" />
                                    </svg>
                                @endif
                            </x-primary-button>
                        </form>
                    @else
                        <a href="{{ route('profile.edit') }}"
                            class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-xl font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-700 focus:outline-none focus:border-blue-700 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">Edit
                            Profile
                        </a>
                    @endif
                </div>
            @endif
        </div>
    </x-card>
@endforeach
