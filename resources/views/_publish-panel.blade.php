<div class="border border-green-700 rounded-lg py-3 mb-8">
    <form method="post" action="/tweets">
    @csrf
        <textarea
            name="body"
            class="w-full px-4"
            placeholder = "What're you thinking?"
        ></textarea>
        <hr class="my-2">

        <footer class="flex justify-between px-4">
            <img
                style="height:40px; width:40px;"
                src="/images/logo.png"
                alt=""
                class="rounded-full mr-2"
            />

            <button 
                type="submit" 
                class="bg-green-500 rounded-lg shadow py-1 px-3 text-white"
            >
                Post
            </button>
        </footer>
        @error('body')
            <p class="text-red-500 pl-2 mt-2">{{$message}}</p>
        @enderror
    </form>
</div>
