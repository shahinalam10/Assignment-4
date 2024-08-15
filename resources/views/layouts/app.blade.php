<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Contact Management</title>
    <link rel="stylesheet" href="{{ asset('Assets') }}/css/bootstrap.css">
    <link rel="stylesheet" href="{{ asset('Assets') }}/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2 class="text-warning mt-3 bg-dark p-5">Contact Management Application</h1>
                <div class="btn group">
                    <a class="btn btn-primary px-5" href="{{ url('/contacts') }}">Home</a>
                    <a class="btn btn-info px-4" href="{{ url('/contacts/create') }}">Add Contact</a>
                </div>            
            </div>
        </div>
        <main>
            @yield('content')
        </main>
    </div>
</body>
<script src="{{ asset('Assets') }}/js/bootstrap.js"></script>
</html>













