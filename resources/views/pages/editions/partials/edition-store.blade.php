<?php

use App\Models\Edition;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;

new class extends Component {
    public Edition $edition;
    public bool $active;

    #[Computed]
    #[On('edition-active')]
    public function checkActiveEditions(): bool
    {
        return in_array(true, Edition::pluck('active')->toArray());
    }
}; ?>

<div>
    @if(!$this->checkActiveEditions)
        <flux:modal.trigger name="edition-store" class="flex items-center justify-end">
            <flux:button>{{__('New edition')}}</flux:button>
        </flux:modal.trigger>

        <flux:modal name="edition-store" class="md:w-96">
            <div class="space-y-6">
                <div>
                    <flux:heading size="lg">{{__('New edition')}}</flux:heading>
                    <flux:text class="mt-2">{{__('Create a new edition in your platform.')}}</flux:text>
                </div>

                {{--<flux:input label="Name" placeholder="Your name"/>--}}

                {{--<flux:input label="Date of birth" type="date"/>--}}

                <div class="flex">
                    <flux:spacer/>

                    <flux:button type="submit" variant="primary">Save changes</flux:button>
                </div>
            </div>
        </flux:modal>
    @else
        <flux:callout icon="information-circle">
            <flux:callout.heading>
                {{__('Since an edition is still active, you cannot create a new one.')}}
            </flux:callout.heading>
        </flux:callout>
    @endif
</div>
