<x-mail::message>
<h2>Dear {{ $userName }}</h2>
<p>your order has been deliverd</p>
<p>please if you have any questions call us on: +97154564895</p>

<x-mail::button :url="''">
Button Text
</x-mail::button>

Thanks,<br>
Mega Store
</x-mail::message>
