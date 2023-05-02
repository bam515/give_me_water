<table>
    <thead>
    <tr>
        <th>아이디</th>
        <th>닉네임</th>
        <th>생년월일</th>
        <th>성별</th>
        <th>상태</th>
        <th>등록일시</th>
    </tr>
    </thead>
    <tbody>
    @foreach($members as $member)
        <tr>
            <td>{{ $member->login_id }}</td>
            <td>{{ $member->nick_name }}</td>
            <td>{{ date('Y.m.d', strtotime($member->user_birth)) }}</td>
            <td>{{ $member->user_gender === 'mali' ? '남성' : '여성' }}</td>
            <td>{{ $member->status === 0 ? '정상' : '차단' }}</td>
            <td>{{ date('Y.m.d H:i:s', strtotime($member->created_at)) }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
