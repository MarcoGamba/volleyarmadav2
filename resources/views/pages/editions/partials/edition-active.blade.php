<?php

use App\Models\Edition;
use Livewire\Component;

new class extends Component {
    public Edition $edition;
    public bool $active = false;

    public function mount(Edition $edition): void
    {
        $this->active = $edition->active;
    }

    public function updatedActive($value): void
    {
        $this->edition->active = $value;

        if (!$this->edition->active) {
            $this->edition->registrations = false;
        }

        $this->edition->save();

        $this->dispatch('edition-active');
    }
}; ?>

<div class="flex items-center gap-2">
    <flux:field variant="inline">
        <flux:switch wire:model.live="active"/>
    </flux:field>

    <flux:badge color="{{$edition->active ? 'green' : ''}}">
        {{__('Edition')}} {{ $edition->edition_number }}
    </flux:badge>
</div>
