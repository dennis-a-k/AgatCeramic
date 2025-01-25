<table>
    <tbody>
        @foreach ($items as $item)
            <tr>
                <td>
                    {{ $item }}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
