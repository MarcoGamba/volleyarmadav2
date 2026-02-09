<header class="container mx-auto flex items-center justify-between py-4">
    <a href="{{route('home')}}" class="flex items-center gap-2" wire:navigate>
        <x-app-logo-icon class="size-7 fill-current text-black dark:text-white"/>
        <span class="uppercase font-semibold -tracking-wider">{{config('app.name')}}</span>
    </a>

    <x-nav/>
</header>
