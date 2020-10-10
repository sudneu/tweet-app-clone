<x-app style="min-width:650px;">
    <header class="mb-6">
        <div class="relative">
            <img
                src="/images/default-profile-banner.png"
                alt="profile-banner"
                class="rounded-lg"
            />
            <img
                src="/images/avatar.jpg"
                alt="profile-picture"
                class="absolute rounded-full mr-2 bottom-0 transform -translate-x-1/2 translate-y-1/2"
                style="left:50%;width: 150px;"
            />
        </div>

        <div class="flex justify-between items-center py-2">
            <div>
                <h2 class="font-bold text-2xl mb-0">{{$user->name}}</h2>
                <p class="text-sm">Joined {{$user->created_at->diffForHumans() }}</p>
            </div>

            <div class="flex justify-between">
                @can('edit', $user)
                    <a href="{{$user->path('edit') }}" 
                        class="bg-blue-500 rounded-full shadow py-1 px-2 text-white text-xs mr-2"
                    >
                        Edit Profile
                    </a>
                @endcan
                <x-follow-button :user="$user">
                </x-follow-button>
            </div>
        </div>

        <p class="mt-4">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos accusamus quidem, minima dolor facilis exercitationem officiis molestiae dicta, aut suscipit quasi? Ea architecto dolores perspiciatis exercitationem error, iusto voluptate tempore!
        </p>
    </header>

    @include('_timeline',[
        'tweets' => $user->tweets,
    ])
</x-app>