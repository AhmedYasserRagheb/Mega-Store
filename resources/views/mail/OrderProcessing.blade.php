<x-mail::message>
    <h3>Welcome {{ $userName }}</h3>
    <p>your order has been processing , we will notify you when deliverd</p>
    <x-mail::button :url="''">
        click me
    </x-mail::button>

    Thanks,<br>
    <h2>Mega-Store</h2>
</x-mail::message>