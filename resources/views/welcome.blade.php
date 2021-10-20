<x-guest-layout>
    @if(Auth::user())
    <p>Welcome to products list</p>
    @else
    <p>Login or Register to create product</p>
    @endif
</x-guest-layout>