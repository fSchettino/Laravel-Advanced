<table>
    @foreach($posts as $post)
        <tr>
            <td>{{ $post->active }}</td>
            <td>{{ $post->title }}</td>
        </tr>
    @endforeach
</table>

{{-- appends(request()->input()) method allows to use pagination links without lose query string filters --}}
{{ $posts->appends(request()->input())->links() }}
