<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Ad;
use Carbon\Carbon;

class AdBlock extends Component
{
    public $position;
    public $limit;

    public function __construct($position, $limit = 3)
    {
        $this->position = $position;
        $this->limit = $limit;
    }

    public function render()
    {
        $ads = Ad::where('position', $this->position)
            ->whereDate('start_date', '<=', Carbon::now())
            ->whereDate('end_date', '>=', Carbon::now())
            ->limit($this->limit)
            ->get();

        return view('components.ad-block', compact('ads'));
    }
}
