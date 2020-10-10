<div class="border border-blue-400 rounded-md">
    @forelse($tweets as $tweet)
        @include('_message-feed')
    @empty  
        <p class = "p-4">No Tweets Yet</p>
    @endforelse                
</div>