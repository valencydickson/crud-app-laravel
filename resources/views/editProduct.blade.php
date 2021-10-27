<x-guest-layout>
    <div>
        <h3 class="font-bold">Edit Product</h3>
    </div>
    <div>
        <form action="/create/edited/{{$product->id}}" method="post">
            @csrf
            @method("put")
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title" value={{$product->title}}>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" class="form-control" name="description" value="{{$product->description}}">
            </div>

            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" class="form-control" name="price" value="{{$product->price}}">
            </div>

            <button type="submit" class="btn btn-primary">SUBMIT</button>
        </form>
    </div>
</x-guest-layout>