<table>
    <thead>
    <tr>
        <th>화초 이름</th>
        <th>물 주기 정보</th>
        <th>좋아요 수</th>
        <th>댓글 수</th>
        <th>등록일시</th>
    </tr>
    </thead>
    <tbody>
    @foreach($plants as $plant)
        <tr>
            <td>{{ $plant->plant_name }}</td>
            <td>{{ $plant->water_cycle }}</td>
            <td>{{ number_format($plant->likeCount) }}</td>
            <td>{{ number_format($plant->commentCount) }}</td>
            <td>{{ date('Y.m.d H:i:s', strtotime($plant->created_at)) }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
