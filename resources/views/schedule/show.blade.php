<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ $schedule->name }}
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                   
                    <h3">Week of {{ $dates->start->format('Y-m-d') }} to {{ $dates->end->format('Y-m-d') }}</h3>
                        @foreach ($dates as $date)
                            <div>{{ $date->format('Y-m-d') }}</div>
                            <!-- Display schedule details for each date -->
                        @endforeach
                        <div class="flex space-x-4">
                            <a href="{{ route('schedule.show', ['id' => $schedule->id, 'date' => $prevWeek]) }}" class="link flex items-center text-sm text-blue-600 hover:text-purple-500 active:text-orange-500 transition duration-500 ease-in-out">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m11.25 9-3 3m0 0 3 3m-3-3h7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                                Previous
                            </a>

                            <a href="{{ route('schedule.show', ['id' => $schedule->id, 'date' => $nextWeek]) }}" class="link flex items-center text-sm text-blue-600 hover:text-purple-500 active:text-orange-500 transition duration-500 ease-in-out">
                                Next
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m12.75 15 3-3m0 0-3-3m3 3h-7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                            </a>
                        </div>
                </div>
            </div>
        </div>
    </div>
    
    

</x-app-layout>
