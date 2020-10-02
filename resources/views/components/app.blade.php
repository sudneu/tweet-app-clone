<x-master>
    <section class="px-8">
        <main class="constainer mx-auto">
        <div class="flex justify-between">   
            @if(auth()->check()) 
                <div class="flex-1">
                    @include('_sidebar-links')
                </div> 
            @endif   
                <div class="flex-auto" style="max-width:700px;">
                    {{ $slot }}
                
                </div>
            @if(auth()->check())
                <div class="flex-1 mx-6 bg-green-300 h-full rounded-md p-4">
                    @include('_friends-list')
                </div>
            @endif
        </div>
        </main>
    <section>
</x-master>