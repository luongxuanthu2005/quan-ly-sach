<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Quản lý sách')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <style>
        body {
            background-color: #f4f6f9;
            font-family: Arial, sans-serif;
        }

        .navbar-brand {
            font-weight: bold;
        }

        .main-container {
            margin-top: 30px;
            margin-bottom: 40px;
        }

        .card {
            border: none;
            border-radius: 10px;
        }

        .card-header {
            font-weight: bold;
        }

        .table th,
        .table td {
            vertical-align: middle;
        }

        .form-label {
            font-weight: 600;
        }
    </style>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ route('saches.index') }}">
            📚 QUẢN LÝ SÁCH
        </a>

        <div class="navbar-nav ms-auto">
            <a class="nav-link text-white"
               href="{{ route('saches.index') }}">
                Danh sách sách
            </a>

            <a class="nav-link text-white"
               href="{{ route('saches.create') }}">
                Thêm sách
            </a>
        </div>
    </div>
</nav>

<main class="container main-container">

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <strong>Dữ liệu chưa hợp lệ:</strong>

            <ul class="mb-0 mt-2">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @yield('content')

</main>

<footer class="text-center text-muted py-3">
    <small>Ứng dụng quản lý sách bằng Laravel và MySQL</small>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</script>

</body>
</html>

