@component('mail::message')
# Introduction
Hi {{ $user->name }},

Your Post is updated successfully!!

@component('mail::button', ['url' => '127.0.0.1:8000'])
    Button Text
@endcomponent

Thank you for using laravel,<br>
{{ config('app.name') }}
@endcomponent
