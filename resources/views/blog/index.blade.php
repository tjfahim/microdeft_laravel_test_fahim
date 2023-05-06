<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laravel 9 CRUD Tutorial Example</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Blog</h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('blog.create') }}"> Create blog</a>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>blog Name</th>
                    <th>blog Email</th>
                    <th>blog Address</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($blog as $blog)
                    <tr>
                        <td>{{ $blog->id }}</td>
                        <td>{{ $blog->name }}</td>
                        <td>{{ $blog->email }}</td>
                        <td>{{ $blog->address }}</td>
                        <td>
                            <form action="{{ route('blog.destroy',$blog->id) }}" method="Post">
                                <a class="btn btn-primary" href="{{ route('blog.edit',$blog->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>