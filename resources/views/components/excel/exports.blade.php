<table>
    <tbody>
        <tr>
            @foreach ($categories as $category)
                <td>{{ $category->title }}</td>
            @endforeach
        </tr>

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
    </tbody>
</table>
