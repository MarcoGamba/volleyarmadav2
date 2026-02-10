<?php
    
use Livewire\Component;

new class extends Component {
    //
}; ?>

<section class="w-full">
    @include('partials.editions-heading')

    <x-pages::editions.layout>
        <div class="space-y-6">
            <livewire:pages::editions.partials.edition-store/>

            <livewire:pages::editions.partials.editions-table/>
        </div>
    </x-pages::editions.layout>
</section>
