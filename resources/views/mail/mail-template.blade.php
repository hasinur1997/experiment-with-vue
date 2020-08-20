@component('mail::message')
# A markdown mail
- A list
- goes
- here
@component('mail::button', ['url' => 'https://facebook.com'])
    Visit here
@endcomponent

@endcomponent
