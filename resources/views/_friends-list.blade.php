<h3 class="font-bold text-xl mb-4">Following</h3>

<ul>
    @foreach (auth()->user()->follows as $user)
        <li class="mb-2">
            <a href="{{route('profile', $user)}}" class="flex items-center text-sm">
                <img
                    style="height:40px; width:40px;"
                    src="/images/logo.png"
                    alt=""
                    class="rounded-full mr-2"
                />

                {{$user->name}}
            </a>
        </li>
    @endforeach
</ul>