<?php

namespace App\Exports;

use App\Models\Plant;
use App\Models\PlantComment;
use App\Models\PlantLike;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PlantExport implements FromView
{
    public function view(): View {
        // like sub query
        $likeSub = PlantLike::selectRaw('count(like_id) as likeCount, plant_id')->groupBy('plant_id');

        // comment sub query
        $commentSub = PlantComment::selectRaw('count(comment_id) as commentCount, plant_id')
            ->groupBy('plant_id');

        $plants = Plant::from('plants as p')
            ->selectRaw('p.plant_id, plant_name, water_cycle, p.created_at, likeCount, commentCount')
            ->leftJoinSub($likeSub, 'pl', function ($join) {
                $join->on('p.plant_id', '=', 'pl.plant_id');
            })->leftJoinSub($commentSub, 'pc', function ($join) {
                $join->on('p.plant_id', '=', 'pc.plant_id');
            })->latest('p.plant_id')->get();

        return view('admin.excel.plant', [
            'plants' => $plants
        ]);
    }
}
