<table>
    <tbody>
        @if (isset($categories->children))
            <tr>
                @foreach ($categories->children as $type)
                    <td>{{ $type->title }}</td>
                @endforeach
            </tr>
        @else
            <tr>
                @foreach ($categories as $category)
                    <td>{{ $category->title }}</td>
                @endforeach
            </tr>
        @endif

        <tr>
            @foreach ($sizes as $size)
                <td>{{ $size->title }}</td>
            @endforeach
        </tr>

        <tr>
            @foreach ($colors as $color)
                <td>{{ $color->title }}</td>
            @endforeach
        </tr>

        <tr>
            @foreach ($patterns as $pattern)
                <td>{{ $pattern->title }}</td>
            @endforeach
        </tr>

        <tr>
            @foreach ($textures as $texture)
                <td>{{ $texture->title }}</td>
            @endforeach
        </tr>

        <tr>
            @foreach ($brands as $brand)
                <td>{{ $brand->title }}</td>
            @endforeach
        </tr>

        <tr>
            @foreach ($collections as $collection)
                <td>{{ $collection->title }}</td>
            @endforeach
        </tr>

        <tr>
            @foreach ($countries as $country)
                <td>{{ $country->name }}</td>
            @endforeach
        </tr>

        <tr>
            <td>шт</td>
            <td>м2</td>
        </tr>

        <tr>
            <td>да</td>
            <td>нет</td>
        </tr>

        @if (isset($grout->children))
            <tr>
                @foreach ($grout->children as $type)
                    <td>{{ $type->title }}</td>
                @endforeach
            </tr>
        @endif

        @if (isset($categories->children))
            <tr>
                @foreach ($categories->children as $child)
                    @foreach ($child->children as $type)
                        <td>{{ $type->title }}</td>
                    @endforeach
                @endforeach
            </tr>
        @endif
    </tbody>
</table>
