<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\View\Component;

class Svg extends Component
{
    /**
     * Create a new component instance.
     */
    public $svgContent;

    public function __construct($i)
    {
        $this->svgContent = Cache::rememberForever('svg_'.$i, function () use ($i) {
            try {
                return file_get_contents(asset('general/svg/'.$i.'.svg'));
            } catch (\Exception $e) {
                Log::error('Error fetching SVG: '.$e->getMessage());
                return ''; // or a default SVG content
            }
        });
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return <<<'blade'
             {!! $svgContent !!}
        blade;
    }
}
