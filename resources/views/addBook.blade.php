<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Book</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f8f9fa; /* Light grey background */
        }
        .card {
            margin-top: 20px;
        }
        .card-header {
            background-color: #343a40;
            color: white;
        }
        .form-group label {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2 class="mb-0">Add New Book</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('book.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}" placeholder="Enter Book Title" required>
                            </div>
                            <div class="form-group">
                                <label for="author">Author</label>
                                <input type="text" class="form-control" id="author" name="author" value="{{old('author')}}" placeholder="Enter Book Author" required>
                            </div>
                            <div class="form-group">
                                <label for="publisher_name">Publisher</label>
                                <input type="text" class="form-control" id="publisher_name" name="publisher_name" value="{{old('publisher_name')}}" placeholder="Enter Publisher"required>
                            </div>
                            <div class="form-group">
                                <label for="published_year">Year Published</label>
                                <input type="number" class="form-control" id="published_year" name="published_year" min="1900" max="{{date('Y')}}" value="{{old('published_year')}}" placeholder="Must Be Year 1900 and Above"required>
                            </div>
                            <div class="form-group">
                                <label for="category">Category</label>
                                <select class="form-control" id="category" name="category" value="{{old('category')}}" required>
                                    <option value="action">Action</option>
                                    <option value="adventure">Adventure</option>
                                    <option value="anime">Anime</option> 
                                    <option value="comedy">Comedy</option> 
                                    <option value="drama">Drama</option>
                                    <option value="fantasy">Fantasy</option>
                                    <option value="horror">Horror</option>
                                    <option value="mystery">Mystery</option>
                                    <option value="romance">Romance</option>
                                    <option value="thriller">Thriller</option>  
                                    <option value="other">Others..</option>    
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
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
