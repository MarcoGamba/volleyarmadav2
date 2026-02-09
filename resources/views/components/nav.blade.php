<nav class="flex items-center gap-4 text-sm uppercase font-semibold">
    <ul class="flex items-center">
        <li>
            <a
                href="{{ route('about') }}"
                class="inline-block"
                wire:navigate
            >
                {{__('About')}}
            </a>
        </li>
    </ul>

    @if (Route::has('login'))
        <ul class="flex items-center gap-4 pl-4 border-l-2">
            @auth
                <li>
                    <a
                        href="{{ url('/dashboard') }}"
                        class="inline-block"
                        wire:navigate
                    >
                        {{__('Dashboard')}}
                    </a>
                </li>
            @else
                <li>
                    <a
                        href="{{ route('login') }}"
                        class="inline-block"
                        wire:navigate
                    >
                        {{__('Log in')}}
                    </a>
                </li>

                @if (Route::has('register'))
                    <li>
                        <a
                            href="{{ route('register') }}"
                            class="inline-block"
                            wire:navigate
                        >
                            {{__('Register')}}
                        </a>
                    </li>
                @endif
            @endauth
        </ul>
    @endif
</nav>
