@component('mail::message')
# Offer Received

You receive new offer. Check your dashboard for new offers.

@component('mail::button', ['url' => $url])
View Order
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent