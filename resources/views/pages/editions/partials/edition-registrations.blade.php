<?php

use App\Models\Edition;
use Livewire\Attributes\On;
use Livewire\Component;

new class extends Component {
    public Edition $edition;
    public bool $registrations = false;

    public function mount(Edition $edition): void
    {
        $this->registrations = $edition->registrations;
    }

    #[On('edition-active')]
    public function refreshComponent(): void
    {
        $this->registrations = $this->edition->registrations;
    }

    public function updatedRegistrations($value): void
    {
        if ($this->edition->active) {
            $this->edition->registrations = $value;
            $this->edition->save();
        }

        /*$this->dispatch('edition-');*/
    }
}; ?>

<div class="flex items-center gap-2">
    <flux:field variant="inline">
        <flux:switch
            wire:model.live="registrations"
            :disabled="$this->edition->active === false"
        />
    </flux:field>

    <div>
        <flux:badge color="{{$edition->registrations ? 'green' : 'red'}}">
            {{$edition->registrations ? __('Registration open') : __('Registration closed')}}
        </flux:badge>
    </div>
</div>
