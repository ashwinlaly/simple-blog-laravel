<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
</head>
<body>
    <div class="jumbotron">Welcome.</div>
    <div class="row">
        <div class="col-lg-4"></div>
        <div class="col-lg-4">
            <form action="{{ route('login.login') }}" method="post">
                <div class="card">
                    <div class="card-header">Login</div>
                    <div class="card-body">
                        <div class="form-group">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" placeholder="Enter the Email" value="{{ old('email') }}" class="form-control" />
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" placeholder="Enter the Password" value="" class="form-control" />
                        </div>
                        @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="card-footer">
                        @csrf
                        <input type="reset" class="btn btn-warning" name="reset" value="Reset" />
                        <input type="submit" class="btn btn-primary" name="Submit" value="Submit" />
                    </div>
                </div>
            </form>
            @include('template.flash')
        </div>
        <div class="col-lg-4"></div>
    </div>
</body>
    <script type="text/javascript" src=" {{ asset('js/jquery.min.js') }}"></script>
    <script type="text/javascript" src=" {{ asset('js/jquery.validate.min.js') }}"></script>
    <script type="text/javascript" src=" {{ asset('js/bootstrap.min.js') }}"></script>
</html>