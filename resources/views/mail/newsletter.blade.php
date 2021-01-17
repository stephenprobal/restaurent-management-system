
{{-- 
@foreach ($newsleetters as $newsleetter)
                    <h3>{{ $newsleetter->newsleetter_name }}</h3>
                    <br><br>
                    <p>{{ $newsleetter->newsleetter_long_description }}</p>
@endforeach --}}



@component('mail::message')

# Hello {{ $user_name_for_mail->name }},You are welcome to our restaurent.




@component('mail::panel')
 <h3 style="color:red;">10% off</h3> for takeway only!!
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

