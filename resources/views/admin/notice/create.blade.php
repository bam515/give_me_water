@extends('admin.notice.layout')
@section('content')
    <style>
        .ck-editor__editable[role="textbox"] {
            /* editing area */
            min-height: 200px;
        }
        .ck-content .image {
            /* block images */
            max-width: 80%;
            margin: 20px auto;
        }
    </style>
    @include('admin.include.header')
    <div id="layoutSidenav">
        @include('admin.include.side-nav')
        <div id="layoutSidenav_content">
            <main>
                <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
                    <div class="container-fluid px-4">
                        <div class="page-header-content">
                            <div class="row align-items-center justify-content-between pt-3">
                                <div class="col-auto mb-3">
                                    <h1 class="page-header-title">
                                        <div class="page-header-icon"><i data-feather="file-plus"></i></div>
                                        공지사항 작성
                                    </h1>
                                </div>
                                <div class="col-12 col-xl-auto mb-3">
                                    <a class="btn btn-sm btn-light text-primary" href="{{ route('admin.notice.index') }}">
                                        <i class="me-1" data-feather="arrow-left"></i>
                                        돌아가기
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>
                <!-- Main page content-->
                <div class="container-fluid px-4">
                    <div class="row gx-4">
                        <div class="col-lg-8">
                            <div class="card mb-4">
                                <div class="card-header">공지사항 제목</div>
                                <div class="card-body"><input class="form-control" id="title" type="text" name="notice_title" placeholder="제목을 입력해주세요..." /></div>
                            </div>
                            <div class="card card-header-actions mb-4 mb-lg-0">
                                <div class="card-header">공지사항 내용</div>
                                <div class="card-body">
                                    <textarea id="editor" name="notice_content"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card card-header-actions">
                                <div class="card-header">제출</div>
                                <div class="card-body">
                                    <div class="d-grid mb-3">
                                        <button class="fw-500 btn btn-primary" onclick="registerNotice()">등록</button>
                                    </div>
                                    <div class="d-grid">
                                        <button class="fw-500 btn btn-primary-soft text-primary" onclick="cancelWrite()">취소</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            @include('admin.include.footer')
        </div>
    </div>
    <script src="https://cdn.ckeditor.com/ckeditor5/37.1.0/classic/ckeditor.js"></script>
    <script>
        let editor;

        ClassicEditor
            .create(document.querySelector('#editor'), {
                placeholder: '내용을 입력해주세요...',
                fontFamily: {
                    options: [
                        'default',
                        'Arial, Helvetica, sans-serif',
                        'Courier New, Courier, monospace',
                        'Georgia, serif',
                        'Lucida Sans Unicode, Lucida Grande, sans-serif',
                        'Tahoma, Geneva, sans-serif',
                        'Times New Roman, Times, serif',
                        'Trebuchet MS, Helvetica, sans-serif',
                        'Verdana, Geneva, sans-serif'
                    ],
                    supportAllValues: true
                },
                toolbar: {
                    items: [
                        'heading', '|',
                        'bold', 'italic', '|',
                        'bulletedList', 'numberedList', '|',
                        'outdent', 'indent', '|',
                        'undo', 'redo',
                        '-',
                    ],
                    shouldNotGroupWhenFull: true
                },
            })
            .then(newEditor => {
                editor = newEditor;
            })
            .catch(error => {
                console.error(error);
            });

        function cancelWrite() {
            if (confirm('공지사항을 저장하지 않고 돌아가시겠습니까?')) {
                location.href = '{{ route('admin.notice.index') }}';
            }
        }

        function registerNotice() {
            var title = document.getElementById('title').value;
            var content = editor.getData();

            if (title.trim().length === 0) {
                alert('제목을 입력해주세요.');
                return false;
            } else if (content.length === 0) {
                alert('내용을 입력해주세요.');
                return false;
            }

            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: '{{ route('admin.notice.store') }}',
                type: 'post',
                data: {
                    'notice_title': title,
                    'notice_content': content
                },
                dataType: 'json',
                success: function (res) {
                    if (res.code === 200) {
                        alert('등록되었습니다.');
                        location.href = '{{ route('admin.notice.index') }}';
                    } else {
                        alert('등록 실패');
                        console.log(res);
                    }
                },
                error: function (request, status, error) {
                    console.error('code: ' + request.status + '\n' + 'message: ' + request.responseText + '\n' +
                        'error: ' + error);
                }
            })
        }
    </script>
@endsection
