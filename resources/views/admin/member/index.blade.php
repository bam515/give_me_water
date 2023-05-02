@extends('admin.member.layout')
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
                                        회원 관리
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>
                <!-- Main page content-->
                <div class="container-xl px-4 mt-n10">
                    <div class="card mb-4">
                        <div class="card-header">회원 관리</div>
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
                                        onclick="location.href='{{ route('admin.member.excel') }}'"><i class="fa-regular fa-file-excel"></i>&nbsp;Excel</button>
                                <div class="datatable-search">
                                    <input type="text" class="datatable-input"
                                           name="keyword" placeholder="검색" value="{{ old('keyword') }}">
                                </div>
                            </form>
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>닉네임</th>
                                    <th>아이디</th>
                                    <th>생년월일</th>
                                    <th>성별</th>
                                    <th>등록일시</th>
                                    <th>상태</th>
                                    <th>관리</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                    $no = $members->total() - (($members->currentPage() - 1) * $members->perPage());
                                @endphp

                                @foreach($members as $member)
                                    <tr>
                                        <td>{{ $no-- }}</td>
                                        <td>{{ $member->nick_name }}</td>
                                        <td>{{ $member->login_id }}</td>
                                        <td>{{ date('Y.m.d', strtotime($member->user_birth)) }}</td>
                                        <td>{{ $member->user_gender === 'male' ? '남자' : '여자' }}</td>
                                        <td>{{ date('Y.m.d H:i:s', strtotime($member->created_at)) }}</td>
                                        <td>{{ $member->status === 0 ? '정상': '차단' }}</td>
                                        <td>
                                            <button class="btn btn-datatable btn-icon btn-transparent-dark me-2" onclick="blockMember({{ $member->user_id }})">
                                                <i class="fa-solid fa-stop-circle"></i>
                                            </button>
                                            <button class="btn btn-datatable btn-icon btn-transparent-dark" onclick="deleteMember({{ $member->user_id }})">
                                                <i class="fa-regular fa-trash-can"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $members->withQueryString()->links('vendor.pagination.bootstrap-4') }}
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
