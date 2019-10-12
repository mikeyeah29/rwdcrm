@component('mail::message')
# Introduction

A enquiry has been made from {{ domain }}.

The information has been saved in the crm.

@component('mail::button', ['url' => 'crm.rwdstaging.co.uk/contacts'])
View Contacts
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
