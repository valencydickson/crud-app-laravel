<div>
    <div class="mt-2">
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