<x-mail::message>
# New Appointment Request | Website
You have a new appointment request from **{{ isset($appointment->name) ? $appointment->name : 'Unknown' }}**, requested through the website.

<x-mail::panel>
@if(isset($appointment->name))
### Name
{{ $appointment->name }} <br>
@endif

@if(isset($appointment->email))
### Email
<a href="mailto:{{ $appointment->email }}">{{ $appointment->email }}</a> <br>
@endif

@if(isset($appointment->phone))
### Phone
<a href="tel:{{ $appointment->phone }}">{{ $appointment->phone }}</a> <br>
@endif

@if(isset($appointment->message))
### Message
{{ $appointment->message }} <br>
@endif
</x-mail::panel>

</x-mail::message>
