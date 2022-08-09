@component('mail::message')
<h1>Hello {{$mailOpener}} </h1>

    
@component('mail::panel')
{{$emailContent}}.
@endcomponent


Thanks,<br>
{{ config('app.name') }}<br>
Laravel Team.
@endcomponent

