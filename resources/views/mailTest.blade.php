@component('mail::message')
# Introduction {{$tutorials-> title}}

{{$tutorials-> description}}

@component('mail::button', ['url' =>url('/tutorials/'. $tutorials->id )])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
