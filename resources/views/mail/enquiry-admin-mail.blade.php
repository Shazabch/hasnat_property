<x-mail::message>
# New Enquiry | Website
You have a new enquiry from **{{ isset($enquiry->name) ? $enquiry->name : 'Unknown' }}**, requested through the website.

<x-mail::panel>
@if(isset($enquiry->name))
### Name
{{ $enquiry->name }} <br>
@endif

@if(isset($enquiry->email))
### Email
<a href="mailto:{{ $enquiry->email }}">{{ $enquiry->email }}</a> <br>
@endif

@if(isset($enquiry->phone))
### Phone
<a href="tel:{{ $enquiry->phone }}">{{ $enquiry->phone }}</a> <br>
@endif

@if(isset($enquiry->message))
### Message
{{ $enquiry->message }} <br>
@endif
</x-mail::panel>

</x-mail::message>
