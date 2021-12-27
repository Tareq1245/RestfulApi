<h4>Hello {{$user->name}}
Thanks for create an account. Please verify your email by using the link: 
{{route('verify', $user->verification_token)}}

</h4>