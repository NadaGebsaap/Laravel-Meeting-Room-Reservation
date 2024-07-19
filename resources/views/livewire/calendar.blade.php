<div class="px-20">
    <div>
        <select wire:model.live="selectedYear" class="rounded">
            @foreach($years as $y)
                <option value="{{ $y }}">{{ $y }}</option>
            @endforeach
        </select>

        <select wire:model.live="selectedMonth" class="rounded">
            @foreach($months as $m)
                <option value="{{ $m }}">{{ $m }}</option>
            @endforeach
        </select>
    </div>

    <div class="grid grid-cols-7 gap-1 text-center mt-4">
        <div>Mon</div>
        <div>Tue</div>
        <div>Wed</div>
        <div>Thu</div>
        <div>Fri</div>
        <div>Sat</div>
        <div>Sun</div>
    </div> 

    <div class="grid grid-cols-7 gap-1">
        @foreach($this->days as $day)
            @if (empty($day))
                <div class="aspect-square flex justify-center items-center bg-gray-300">{{ $day }}</div>
            @else
                <div class="aspect-square flex justify-center items-center bg-sky-300">{{ $day }}</div>
            @endif
        @endforeach
    </div>
</div>

