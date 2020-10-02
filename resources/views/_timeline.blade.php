<div class="border border-blue-400 rounded-md">
    @foreach($tweets as $tweet)
        @include('_message-feed')
    @endforeach                
</div>