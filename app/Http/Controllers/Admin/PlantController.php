<?php

namespace App\Http\Controllers\Admin;

use App\Exports\PlantExport;
use App\Http\Controllers\Controller;
use App\Models\Plant;
use App\Models\PlantComment;
use App\Models\PlantLike;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class PlantController extends Controller
{
    // index
    public function index(Request $request) {
        $request->flash();

        // like sub query
        $likeSub = PlantLike::selectRaw('count(like_id) as likeCount, plant_id')->groupBy('plant_id');

        // comment sub query
        $commentSub = PlantComment::selectRaw('count(comment_id) as commentCount, plant_id')
            ->groupBy('plant_id');

        $plants = Plant::from('plants as p')
            ->selectRaw('p.*, u.nick_name, pl.likeCount, pc.commentCount')
            ->leftJoin('users as u', 'p.user_id', '=', 'u.user_id')
            ->leftJoinSub($likeSub, 'pl', function ($join) {
                $join->on('p.plant_id', '=', 'pl.plant_id');
            })->leftJoinSub($commentSub, 'pc', function ($join) {
                $join->on('p.plant_id', '=', 'pc.plant_id');
            });

        if ($request->filled('keyword')) {
            $keyword = '%' . $request->keyword . '%';
            $plants->where(function ($query) use ($keyword) {
                $query->where('p.plant_name', 'like', $keyword)
                    ->orWhere('u.nick_name', 'like', $keyword);
            });
        }

        if ($request->filled('order')) {
            $order = $request->order;
            $plants->latest($order);
        } else {
            $plants->latest('p.created_at');
        }

        $plants->latest('p.plant_id');

        if ($request->filled('post')) {
            $plants = $plants->paginate($request->post);
        } else {
            $plants = $plants->paginate(20);
        }

        return view('admin.plant.index', compact('plants'));
    }

    // detail
    public function show(Plant $plant) {
        return view('admin.plant.show', compact('plant'));
    }

    // delete
    public function delete(Plant $plant) {
        DB::beginTransaction();

        try {
            $plant->delete();
            $code = 200;
            $message = 'success';
            DB::commit();
        } catch (\Exception $exception) {
            $code = 500;
            $message = $exception->getMessage();
            DB::rollBack();
        }
        return response()->json([
            'code' => $code,
            'message' => $message
        ]);
    }

    // excel download
    public function excel() {
        return Excel::download(new PlantExport(), '화단관리_' . date('Y-m-d') . '.xlsx');
    }
}
