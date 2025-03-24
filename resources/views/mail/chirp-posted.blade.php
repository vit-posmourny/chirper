<x-mail::message>
# Introduction

Congrats! Your post is now live on our website.

<x-mail::button :url="'http://chirper.test/chirps'">
View your chirps
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>