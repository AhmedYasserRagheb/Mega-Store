<x-mail::message>
    # Introduction

    Dear {{ $userName}}
    your order has been deliverd

    <x-mail::button :url="'$print'">
        download Invoice
    </x-mail::button>

    Thanks,<br>
    
    <h4>Mega Store</h4>
</x-mail::message>