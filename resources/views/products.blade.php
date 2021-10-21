<x-guest-layout>
    @if (Auth::user())
    <h2 class="mb-3 text-xl font-bold">Products</h2>
    <div>
        <x-form></x-form>
        <table class="table table-hover mt-3">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr>
                    <td>{{$product->title}}</td>
                    <td>{{$product->description}}</td>
                    <td>{{$product->price}}</td>
                    <td class="flex">
                        <form action="">
                            <button class="btn btn-secondary">Edit</button>
                        </form>
                        <form action="">
                            <button class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
    <div>
        <x-modal></x-modal>
    </div>

    @else
    <p>Register to add products</p>
    @endif
</x-guest-layout>