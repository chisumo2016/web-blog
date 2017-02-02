@component('mail::message')
# Introduction

Thanks so much for registering


@component('mail::button', ['url' => ''])
Start Browsing
@endcomponent


@component('mail::panel', ['url' => ''])
Some insipiration quoute to go here
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
