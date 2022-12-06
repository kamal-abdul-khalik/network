<div class="flex justify-between items-center">
    <div class="flex">
        <a href="{{ route('profile.user', $user->username) }}"
            class="p-5 py-2 sm:p-10 sm:py-5 text-center border-r border-l hover:bg-blue-100 transition duration-300">
            <div class="text-2xl font-semibold mb-2">{{ $user->statuses->count() }}</div>
            <div class="text-xs text-gray-600 uppercase">Status</div>
        </a>
        <a href="{{ route('following.index', [$user->username, 'following']) }}"
            class="p-5 py-2 sm:p-10 sm:py-5 text-center border-r hover:bg-blue-100 transition duration-300">
            <div class="text-2xl font-semibold mb-2">{{ $user->follows->count() }}</div>
            <div class="text-xs text-gray-600 uppercase">Following</div>
        </a>
        <a href="{{ route('following.index', [$user->username, 'follower']) }}"
            class="p-5 py-2 sm:p-10 sm:py-5 text-center border-r hover:bg-blue-100 transition duration-300">
            <div class="text-2xl font-semibold mb-2">{{ $user->followers->count() }}</div>
            <div class="text-xs text-gray-600 uppercase">Follower</div>
        </a>
    </div>
    <div>
        {{-- @if (Auth::id() !== $user->id)  --}}
        @if (Auth::user()->isNot($user))
            <form action="{{ route('following.store', $user) }}" method="post">
                @csrf
                <x-primary-button>
                    @if (Auth::user()->follows()->where('following_user_id', $user->id)->first())
                        Unfollow
                    @else
                        Follow
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
</div>
