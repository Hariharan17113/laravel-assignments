@component('mail::message')
# Post Deleted!!
Hi {{ $user->name }},

Your Post is deleted successfully!!

@component('mail::button', ['url' => 'https://mail.google.com/mail/u/0/#inbox'])
    Back to Inbox
@endcomponent

Thank you,<br>
Regards,<br>
Hariharan - Admin
@endcomponent
