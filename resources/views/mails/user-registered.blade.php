@component('mail::message')
  Gentile <strong>{{ $user->name }}</strong>,

  Siamo lieti di darti il benvenuto nella nostra app!

  Per accedere al proprio account Ristoratore, può cliccare sul seguente pulsante:

  @component('mail::button', ['url' => route('admin.home')])
    Accedi
  @endcomponent

  Cordiali saluti, 
  Deliveboo Team 2
@endcomponent