@component('mail::message')
Kami menerima permitaan untuk mengatur ulang password akun Anda.
Silahkan klik tombol di bawah ini untuk reset password Anda.

@component('mail::button', ['url' => $url, 'color' => 'success' ])
Reset Password
@endcomponent

<p class="warning">Reset password link ini hanya berlaku selama 60 menit.</p>

@endcomponent
