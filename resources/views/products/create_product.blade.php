<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href=" {{ asset('css/bootstrap.min.css') }}">
</head>
<body>
    <p class="jumbotron">Welcome</p>
    <div class="row">
        <div class="col-lg-4"></div>
        <div class="col-lg-4">
            <form id="loginform" name="loginform" method="post" action="{{ url('/signin') }}">
                <div class="card">
                    <div class="card-header">Sigin</div>
                    <div class="card-body">
                        <div class="form-group">
                            <label class="form-label">Name </label>
                            <input type="text" name="name" placeholder="Enter the Name" class="form-control"  value="{{ old('name') }}" />
                            @error('name')
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label">Email </label>
                            <input type="email" name="email" placeholder="Enter the Email" class="form-control" value="{{ old('email') }}" />
                            @error('email')
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" placeholder="Enter the Password" class="form-control" />
                            @error('password')
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        @csrf
                        <input type="reset" class="btn btn-danger" name="reset" value="Reset" />
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