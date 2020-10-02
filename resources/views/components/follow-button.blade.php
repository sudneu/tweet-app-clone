@unless(auth()->user()->is($user))
    <form method="post" action="/profiles/{{ $user->name }}/follow">
        @csrf
        <button type="submit" 
                class="bg-green-500 rounded-full 
                shadow py-1 px-2 text-white 
                text-xs"
        >
            {{auth()->user()->following($user) ? "Unfollow Me" : "Follow Me"}}
        </button>
    </form>
@endunless