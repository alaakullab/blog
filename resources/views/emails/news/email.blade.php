@component('mail::message')
# {{$title}}
{!!$desc!!}
Thanks,<br>
{{config('app.name') }}
@endcomponent
