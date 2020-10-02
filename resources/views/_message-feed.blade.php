<div class="flex p-4 {{ $loop->last ? '' : 'border-b border-b-gray-400'}} ">
    <!-- Avatar -->
    <div class="mr-2 flex-shrink-0">
        <a href="{{route('profile', $tweet->user)}}">
            <img
                style="height:40px; width:40px;"
                src="/images/logo.png"
                alt=""
                class="rounded-full mr-2"
            />
        </a>
    </div>
    <!-- Comments -->
    <div>
        <a href="{{route('profile', $tweet->user)}}">
            <h5 class="font-bld mb-4">{{$tweet->user->name}}</h5>
        </a>
        <p class="text-sm">
            {{$tweet->body}}
        </p>
    </div>
</div>