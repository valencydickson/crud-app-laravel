<div>
    <div class="flex items-center">
        @if (Auth::user()->avatar == NULL )
        <img src="https://github.com/valencydickson/crud-app-laravel/blob/main/avatar.png" alt="Avatar"
            class="mr-6 avatar">
        @else
        <img src="{{asset('/storage/images/' . Auth::user()->avatar)}}" alt="Avatar" class="mr-6 avatar">
        @endif
        <div>
            <form action="/upload" method="post" enctype="multipart/form-data">
                @csrf
                <input type="file" name="image"><br>
                <span>Only up to 2 MB</span><br>
                <input type="submit" value="Upload" class="mt-3 py-2 px-6 bg-blue-700 text-white">
            </form>
            @if(session()->has('uploadMessage'))
            <p class="text-green-600">{{session("uploadMessage")}}</p>
            @endif
        </div>
    </div>
    <div class="mt-4">
        <div class="flex justify-between items-center mb-2">
            <div class="flex items-center">
                <p class="mr-3 font-bold">Name: </p>
                <p>{{Auth::user()->name}}</p>
            </div>

        </div>

        <div class="flex justify-between items-center mb-2">
            <div class="flex">
                <p class="mr-3 font-bold">Email: </p>
                <p>{{Auth::user()->email}}</p>
            </div>
        </div>
    </div>
</div>