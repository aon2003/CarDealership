<!DOCTYPE html>
<html lang="en">
<head>
	<title>Models INDEX</title>
</head>
<body>
	<a href="/">Back to Main</a>
	<h1>Models</h1>
    <form action="{{ route('models.index') }}" method="get">
        <input type="hidden" name="search1" value="true" />
        Search by name: <input type="text" name="name" value="{{ $_GET['name'] ?? '' }}"/>
        <input type="submit" value="Search" />
    </form>
    <br>
    <form action="{{ route('models.index') }}" method="get">
        <input type="hidden" name="search2" value="true" />
        Search by brand: <select name="brand_id">
            @foreach($brands as $brand)
                @if(isset($_GET['brand_id']))
                    @if($brand->id == $_GET['brand_id'])
                        <option value="{{ $brand->id }}" selected>{{ $brand->name }}</option>
                    @else
                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                    @endif
                @else
                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                @endif
            @endforeach
        </select>
        <input type="submit" value="Search" />
    </form>
    <hr/>
	<a href="{{ route('models.create') }}">Create new</a><br>
    @if($models->isNotEmpty())
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Brand</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($models as $model)
            <tr>
                <td>{{ $model->id }}</td>
                <td><a href="{{ route('models.show', ['model' => $model]) }}">{{ $model->name }}</a></td>
                <td><a href="{{ route('brands.show', ['brand' => $model->brand]) }}">{{ $model->brand->name }}</a></td>
                <td><a href="{{ route('models.edit', ['model' => $model]) }}">Edit</a></td>
                <td><form action={{ route('models.destroy', ['model' => $model]) }} method="POST">
                        @csrf
                        @method('DELETE')
                        <input type='hidden' name='id' value="{{$model->id}}">
                        <input type="submit" value="Delete"/>
                    </form>
                </td>
                <td>
                    <form action="{{ route('vehicles.index') }}" method="get">
                        <input type="hidden" name="search1" value="true" />
                        <input type="hidden" name="model_id" value="{{ $model->id }}">
                        <input type="submit" value="Get Vehicles" />
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @else
        <p>There's nothing to show!</p>
    @endif
</body>
</html>
