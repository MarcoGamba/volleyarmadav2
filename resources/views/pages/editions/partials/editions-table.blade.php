<?php

use App\Models\Edition;
use Illuminate\Pagination\LengthAwarePaginator;
use LaravelIdea\Helper\App\Models\_IH_Edition_C;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\Attributes\Computed;
use Livewire\WithPagination;

new class extends Component {
    use WithPagination;

    public string $sortBy = 'edition_number';
    public string $sortDirection = 'desc';

    public function sort($column): void
    {
        if ($this->sortBy === $column) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortBy = $column;
            $this->sortDirection = 'asc';
        }
    }

    #[Computed]
    public function editions(): array|LengthAwarePaginator|_IH_Edition_C
    {
        return Edition::query()
            ->tap(fn($query) => $this->sortBy ? $query->orderBy($this->sortBy, $this->sortDirection) : $query)
            ->paginate(5);
    }
}; ?>

<div>
    <flux:table :paginate="$this->editions">
        <flux:table.columns>
            <flux:table.column sortable :sorted="$sortBy === 'edition_number'" :direction="$sortDirection" wire:click="sort('edition_number')">{{__('Edition')}}</flux:table.column>
            <flux:table.column>{{__('Registrations')}}</flux:table.column>
            <flux:table.column>{{__('Created/Updated')}}</flux:table.column>
            <flux:table.column><span class="sr-only">{{__('Actions')}}</span></flux:table.column>
        </flux:table.columns>

        <flux:table.rows>
            @foreach ($this->editions as $edition)
                <flux:table.row
                    :key="$edition->id"
                    class="hover:bg-gray-100 hover:dark:bg-zinc-700"
                >
                    <flux:table.cell class="whitespace-nowrap">
                        <div class="flex items-center gap-2">
                            <livewire:pages::editions.partials.edition-active
                                wire:key="edition-active-{{$edition->id}}"
                                :$edition
                            />
                        </div>
                    </flux:table.cell>

                    <flux:table.cell class="whitespace-nowrap">
                        <div class="flex items-center gap-2">
                            <livewire:pages::editions.partials.edition-registrations
                                wire:key="edition-registrations-{{$edition->id}}"
                                :$edition
                            />
                        </div>
                    </flux:table.cell>

                    <flux:table.cell class="whitespace-nowrap">
                        <div class="space-y-2">
                            <div>
                                {{ $edition->created_at->format('d/m/Y') }} {{ __('at') }} {{ $edition->created_at->format('H:i') }}
                            </div>
                            <div>
                                {{ $edition->updated_at->format('d/m/Y') }} {{ __('at') }} {{ $edition->updated_at->format('H:i') }}
                            </div>
                        </div>
                    </flux:table.cell>

                    <flux:table.cell class="whitespace-nowrap">
                        <div class="flex items-center justify-end gap-6">
                            <div>a1</div>
                            <div>a2</div>
                        </div>
                    </flux:table.cell>
                </flux:table.row>
            @endforeach
        </flux:table.rows>
    </flux:table>
</div>
