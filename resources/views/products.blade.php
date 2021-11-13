<x-guest-layout>
    @if (Auth::user())
    <div>
        <x-form></x-form>
        @if (isset($search) && count($products)>0)
        <p class="my-3 text-success">Results of "{{$search}}" products</p>
        <a href="/" class="btn btn-outline-secondary">See all products</a>
        @elseif (isset($search) ) <p class="my-3 text-success">No product found</p>
        <a href="/" class="btn btn-outline-secondary">See all products</a>

        @endif
        <table class="table table-hover mt-3">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th style="text-align: center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr class="align-items-center">
                    <td>{{$product->title}}</td>
                    <td>{{$product->description}}</td>
                    <td>{{$product->price}}</td>
                    <td class="flex">
                        <a href="/edit/{{$product->id}}" class="mx-3">
                            <i class=" far fa-edit text-secondary"></i>
                        </a>
                        <form action="/delete/{{$product->id}}" method="post">
                            @csrf
                            @method("delete")
                            <button type="submit"><i class="fas fa-trash text-danger"></i></button>

                        </form>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
    <div>
        <x-createModal></x-createModal>

    </div>
    @else
    <div style="text-align: center">
        <h2><a href="/register">Register</a> or <a href="/login">Login</a> to add product.</h2>
    </div>
    @endif
</x-guest-layout>