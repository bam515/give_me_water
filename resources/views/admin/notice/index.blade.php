@extends('admin.notice.layout')
@section('content')
    @include('admin.include.header')
    <div id="layoutSidenav">
        @include('admin.include.side-nav')
        <div id="layoutSidenav_content">
            <main>
                <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
                    <div class="container-xl px-4">
                        <div class="page-header-content pt-4">
                            <div class="row align-items-center justify-content-between">
                                <div class="col-auto mt-4">
                                    <h1 class="page-header-title">
                                        <div class="page-header-icon"><i data-feather="inbox"></i></div>
                                        공지사항 관리
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>
                <!-- Main page content-->
                <div class="container-xl px-4 mt-n10">
                    <div class="card mb-4">
                        <div class="card-header" style="display: flex; align-items: center; height: 60px;">
                            공지사항 관리
                            <button type="button" style="justify-content: flex-end; margin-left: auto;"
                                    class="btn btn-red" onclick="location.href='{{ route('admin.notice.create') }}'">공지사항 작성</button>
                        </div>
                        <div class="card-body">
                            <form class="datatable-top" id="search-form">
                                <div class="datatable-dropdown">
                                    <label>
                                        <select class="datatable-selector"
                                                name="post" onchange="document.getElementById('search-form').submit();">
                                            <option value="10" {{ old('post') === '10' ? 'selected' : '' }}>10</option>
                                            <option value="20" {{ old('post') === '20' ? 'selected' : '' }}>20</option>
                                            <option value="50" {{ old('post') === '50' ? 'selected' : '' }}>50</option>
                                            <option value="100" {{ old('post') === '100' ? 'selected' : '' }}>100</option>
                                        </select>
                                    </label>
                                </div>
                                <div class="datatable-search">
                                    <input type="text" class="datatable-input"
                                           name="keyword" placeholder="검색" value="{{ old('keyword') }}">
                                </div>
                            </form>
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>공지사항 제목</th>
                                    <th>좋아요 수</th>
                                    <th>댓글 수</th>
                                    <th>등록일시</th>
                                    <th>관리</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                    $no = $notices->total() - (($notices->currentPage() - 1) * $notices->perPage());
                                @endphp

                                @foreach($notices as $notice)
                                    <tr>
                                        <td>{{ $no-- }}</td>
                                        <td>{{ $notice->notice_title }}</td>
                                        <td></td>
                                        <td></td>
                                        <td>{{ date('Y.m.d H:i:s', strtotime($notice->created_at)) }}</td>
                                        <td>
                                            <button class="btn btn-datatable btn-icon btn-transparent-dark me-2" onclick="location.href='{{ route('admin.notice.edit', ['notice' => $notice->notice_id]) }}'">
                                                <i data-feather="edit"></i>
                                            </button>
                                            <button class="btn btn-datatable btn-icon btn-transparent-dark" onclick="deleteNotice({{ $notice->notice_id }})">
                                                <i class="fa-regular fa-trash-can"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $notices->withQueryString()->links('vendor.pagination.bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </main>
            @include('admin.include.footer')
        </div>
    </div>

    <script>
        // 공지사항 삭제
        function deleteNotice(notice_id) {
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: '/admin/notice/' + notice_id,
                type: 'delete',
                success: function (res) {
                    if (res.code === 200) {
                        alert('삭제되었습니다.');
                        location.reload();
                    } else {
                        alert('삭제 실패');
                        console.log(res);
                    }
                },
                error: function (request, status, error) {
                    console.log('code: ' + request.status + '\n' + 'message: ' + request.responseText +
                        '\n' + 'error: ' + error);
                }
            })
        }
    </script>
@endsection
