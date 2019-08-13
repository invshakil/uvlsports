@component('mail::message')
    You received a message from : {{ $name }}
    <p>
        Name: {{ $name }}
    </p>
    <p>
        Email: {{ $email }}
    </p>
    <p>
        Message: {{ $user_message }}
    </p>

    @component('mail::button', ['url' => env('APP_URL')])
        Go Back To Website
    @endcomponent

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
