<?php

namespace App\Livewire;

use Livewire\Component;

class Calendar extends Component
{
    public $years;
    public $months;
    public $selectedYear;
    public $selectedMonth;

    protected $queryString = [
        'selectedYear' => [
            'as' => 'year'
        ],
        'selectedMonth' => [
            'as' => 'month'
        ]
    ];

    public function mount($year = null, $month = null)
    {
        $currentYear = now()->year;
        $currentMonth = now()->month;

        $this->selectedYear = $year ?? $currentYear;
        $this->selectedMonth = $month ?? $currentMonth;
        $this->years = range($currentYear, $currentYear + 3);
        $this->months = range(1, 12);
    }

    public function render()
    {
        return view('livewire.calendar', [
            'days' => $this->days,
        ]);
    }

    public function getDaysProperty()
    {
        $firstDay = $this->selectedYear . '-' . $this->selectedMonth . '-01';
        $dayOfWeek = date('N', strtotime($firstDay));

        $days = [];
        for ($i = 1; $i < $dayOfWeek; $i++) {
            $days[] = '';
        }

        $numberOfDays = date('t', strtotime($firstDay));
        for ($i = 1; $i <= $numberOfDays; $i++) {
            $days[] = $i;
        }

        $lastDay = $this->selectedYear . '-' . $this->selectedMonth . '-' . $numberOfDays;
        $lastDayOfWeek = date('N', strtotime($lastDay));

        $colsToAdd = 7 - $lastDayOfWeek;
        for ($i = 0; $i < $colsToAdd; $i++) {
            $days[] = '';
        }

        return $days;
    }
}
