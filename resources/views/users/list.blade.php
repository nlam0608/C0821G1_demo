<!doctype html>
<html lang="en">
<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<label>
    Show Name
    <input type="checkbox" id="show-name" class="" checked>
</label>
<label>
    Chon mau
    <input type="color" id="color-name">
</label>
<div class="container">
    <h3>Danh sach hoc vien di muon</h3>
    <a href="">
        them
    </a>
    <table class="table">
        <tr>
            <td>STT</td>
            <td class="column-name">Name</td>
            <td>Email</td>
            <td></td>
        </tr>
        @foreach($users as $key => $user)
            <tr class="user-item" id="user-item-{{$user->id}}">
                <td>{{ $key + 1 }}</td>
                <td class="column-name">{{ $user['name'] }}</td>
                <td>{{ $user['email'] }}</td>
                <td>
                    <button type="button" data-id="{{$user->id}}" class="btn btn-danger delete-user-item">Delete</button></td>
            </tr>

        @endforeach
    </table>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
<script src="{{ asset('js/my.js') }}"></script>
</body>
</html>
