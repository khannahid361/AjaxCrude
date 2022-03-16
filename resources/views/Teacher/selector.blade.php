<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <title>Select 2 Multiple </title>
</head>

<body>
    <div class="container col-md-6">
        <form action="{{ route('multiSelect') }}" method="post">
            @csrf
            <select class="js-example-basic-multiple form-control" name="states[]" multiple="multiple">
                <option value="AL">Alabama</option>
                <option value="WY">Wyoming</option>
                <option value="fjgi">fjgioming</option>
                <option value="potyiu">potyiuoming</option>
                <option value="otuy">otuyoming</option>
            </select>
            <button type="submit" class="btn btn-outline-success">Submit</button>
        </form>
    </div>
    <script src="{{ asset('public/js/jquery.min.js') }}"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script>
</body>

</html>
