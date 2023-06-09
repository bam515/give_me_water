@extends('admin.plant.layout')
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
                                        <div class="page-header-icon"><i data-feather="filter"></i></div>
                                        화단 관리
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>
                <!-- Main page content-->
                <div class="container-xl px-4 mt-n10">
                    <div class="card mb-4">
                        <div class="card-header">화단 관리</div>
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
                                <button type="button" class="btn btn-green"
                                        onclick="location.href='{{ route('admin.plant.excel') }}'"><i class="fa-regular fa-file-excel"></i>&nbsp;Excel</button>
                                <div class="datatable-search">
                                    <input type="text" class="datatable-input"
                                           name="keyword" placeholder="검색" value="{{ old('keyword') }}">
                                </div>
                            </form>
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>화초 이름</th>
                                    <th>좋아요 수</th>
                                    <th>댓글 수</th>
                                    <th>등록일시</th>
                                    <th>관리</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                    $no = $plants->total() - (($plants->currentPage() - 1) * $plants->perPage());
                                @endphp

                                @foreach($plants as $plant)
                                    <tr>
                                        <td>{{ $no-- }}</td>
                                        <td>{{ $plant->plant_name }}</td>
                                        <td>{{ number_format($plant->likeCount) }}</td>
                                        <td>{{ number_format($plant->commentCount) }}</td>
                                        <td>{{ date('Y.m.d H:i:s', strtotime($plant->created_at)) }}</td>
                                        <td>
                                            <button class="btn btn-datatable btn-icon btn-transparent-dark me-2" onclick="blockMember({{ $plant->user_id }})">
                                                <i class="fa-solid fa-stop-circle"></i>
                                            </button>
                                            <button class="btn btn-datatable btn-icon btn-transparent-dark" onclick="deleteMember({{ $plant->user_id }})">
                                                <i class="fa-regular fa-trash-can"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $plants->withQueryString()->links('vendor.pagination.bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </main>
            @include('admin.include.footer')
        </div>
    </div>

    <script>
        // 회원 차단
        function blockMember(user_id) {
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: '/admin/member/block/' + user_id,
                type: 'put',
                success: function (res) {
                    if (res.code === 200) {
                        alert('차단되었습니다.');
                        location.reload();
                    } else {
                        alert('차단 실패');
                        console.log(res);
                    }
                },
                error: function (request, status, error) {
                    console.log('code: ' + request.status + '\n' + 'message: ' + request.responseText +
                        '\n' + 'error: ' + error);
                }
            })
        }

        // 회원 삭제
        function deleteMember(user_id) {
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: '/admin/member/' + user_id,
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
