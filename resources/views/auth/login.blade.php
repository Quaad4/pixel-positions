<x-layout>
    <x-page-heading>Login</x-page-heading>

    @error('failure')
        <p class='text-red-500 text-center'>{{ $message }}</p>
    @enderror

    <x-forms.form method="POST" action="/login">
        <x-forms.input label="Your Email" name="email"></x-forms.input>
        <x-forms.input label="Your Password" name="password" type="password"></x-forms.input>
        <x-forms.button type="submit">Submit</x-forms.button>
    </x-forms.form>

</x-layout>