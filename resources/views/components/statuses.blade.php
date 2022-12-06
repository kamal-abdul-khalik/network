@foreach ($statuses as $status)
    <x-card>
        <div class="flex">
            <div class="flex-shrink-0 mr-3">
                <img class="w-10 h-10 rounded-full" src="{{ $status->user->gravatar() }}" alt="{{ $status->user->name }}">
            </div>
            <div>
                <div class="font-semibold">
                    <a href="{{ route('profile.user', $status->user->username) }}">{{ $status->user->name }}</a>
                </div>
                <div class=" leading-relaxed ">
                    {{ $status->body }}
                </div>
                <div class="flex text-sm text-gray-500 justify-between">
                    {{-- <div>{{ $status->created_at->format('d F') }}</div> --}}
                    <div>{{ $status->created_at->diffForHumans() }}</div>
                </div>
            </div>
        </div>
    </x-card>
@endforeach
