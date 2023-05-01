<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NoticeController extends Controller
{
    // 공지사항 관리 - index
    public function index(Request $request) {
        $request->flash();

        $notices = Notice::select('*');

        if ($request->filled('keyword')) {
            $keyword = '%' . $request->keyword . '%';
            $notices->where('notice_title', 'like', $keyword)
                ->orWhere('notice_content', 'like', $keyword);
        }

        if ($request->filled('order')) {
            $notices->latest($request->order);
        } else {
            $notices->latest();
        }

        $notices->latest('notice_id');

        if ($request->filled('post')) {
            $notices = $notices->paginate($request->post);
        } else {
            $notices = $notices->paginate(10);
        }

        return view('admin.notice.index', compact('notices'));
    }

    // 공지사항 관리 - create
    public function create() {
        return view('admin.notice.create');
    }

    // 공지사항 관리 - store
    public function store(Request $request) {
        DB::beginTransaction();

        try {
            Notice::create([
                'notice_title' => $request->notice_title,
                'notice_content' => $request->notice_content,
                'created_at' => now(),
                'updated_at' => null
            ]);

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

    // 공지사항 관리 - show
    public function show(Notice $notice) {
        return view('admin.notice.show', compact('notice'));
    }

    // 공지사항 관리 - edit
    public function edit(Notice $notice) {
        return view('admin.notice.edit', compact('notice'));
    }

    // 공지사항 관리 - update
    public function update(Notice $notice, Request $request) {
        DB::beginTransaction();

        try {
            $notice->update([
                'notice_title' => $request->notice_title,
                'notice_content' => $request->notice_content,
                'updated_at' => now()
            ]);

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

    // 공지사항 관리 - delete
    public function delete(Notice $notice) {
        DB::beginTransaction();

        try {
            $notice->delete();

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
}
