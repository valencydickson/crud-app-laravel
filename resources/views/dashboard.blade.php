<x-app-layout>
    <div>
        <div class="flex items-center">
            <img src="{{Auth::user()->avatar===null ? asset('/storage/images/avatar.png'):asset('/storage/images/' . Auth::user()->avatar)}}"
                alt="Avatar" class="mr-6 avatar">
            <form action="/upload" method="post" enctype="multipart/form-data">
                @csrf
                <input type="file" name="image"><br>
                <input type="submit" value="Upload">
            </form>
        </div>
    </div>
</x-app-layout>