@component('mail::message')
# Introduction

Enter this verfication code on signup screen.

@component('mail::button', ['url' => ''])
{{$otp}}
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
