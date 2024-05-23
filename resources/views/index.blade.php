<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f8f9fa;
        }
        .table-hover tbody tr:hover {
            background-color: #f1f1f1;
        }
        .btn-custom {
            background-color: #28a745;
            border-color: #28a745;
            color: white;
        }
        .btn-custom:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }
        .card {
            margin-top: 20px;
        }
        .card-header {
            background-color: #343a40;
            color: white;
        }
        .auth-links a {
            font-size: 1rem;
            font-weight: 600;
            color: #343a40;
            transition: color 0.3s ease;
        }
        .auth-links a:hover {
            color: #28a745;
        }
    </style>
</head>
<body>
    <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white" style="background-color: salmon; height: 150px;">
    @if (Route::has('login'))
            <div class="d-md-flex justify-content-md-end auth-links">
                @auth
                    <a href="{{ url('book') }}" class="btn btn-primary mt-4 mr-4">Home</a>

                    @if (Auth::user()->role === 'supervisor')
                        <a href="{{ route('register') }}" class="btn btn-secondary mt-4 mr-3">Register</a>
                    @endif

                    @if (Auth::user()->role === 'volunteer')
                        <a href="{{ route('member.index') }}" class="btn btn-success mt-4 mr-3">Add New Member</a>
                    @endif
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-danger mt-4 mr-4">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn btn-primary mt-4 mr-4">Log in</a>
                @endauth
            </div>
        @endif
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h1 class="h3 mb-0">Available Books</h1>
                        @auth
                        <a href="{{ route('book.create') }}" class="btn btn-custom">Add New Book</a>
                        @endauth
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th>No.</th>
                                    <th>Book ID</th>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Publisher</th>
                                    <th>Year Published</th>
                                    <th>Category</th>
                                    @auth
                                    <th>Actions</th>
                                    @endauth
                                </tr>
                            </thead>
                            <tbody>
                                @php $counter = 1; @endphp
                                @foreach($Books as $book)
                                <tr>
                                    <td>{{ $counter++ }}</td>
                                    <td>{{ $book->id }}</td>
                                    <td>{{ $book->title }}</td>
                                    <td>{{ $book->author }}</td>
                                    <td>{{ $book->publisher_name }}</td>
                                    <td>{{ $book->published_year }}</td>
                                    <td>{{ $book->category }}</td>
                                    @auth
                                    <td>
                                        <form action="{{ route('book.destroy', $book->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this book?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                    @endauth
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center">
                            {{ $Books->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- Bootstrap JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
