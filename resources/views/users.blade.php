<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/brands.min.css"
        integrity="sha512-EJp8vMVhYl7tBFE2rgNGb//drnr1+6XKMvTyamMS34YwOEFohhWkGq13tPWnK0FbjSS6D8YoA3n3bZmb3KiUYA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="">
    <style>
        .dropdown-menu {
            display: block;
            position: relative;
        }
    </style>

    <title>Users</title>
</head>

<body>

    <div class="container">
        <div class="card mt-5">
            <div class="card-header">
                <h4>شو مابدك</h4>
            </div>
            <div class="card-body">
<div class="row">
    @foreach ($users as $item)
        <div class="col-md-4">
            <div class="content_box">
                <h3>{{ $item->name }}</h3>
                <p> {{ $item->email }} </p>
            </div>
        </div>
    @endforeach
</div> 
     {{ $users->links() }}
                {{-- <div class="alert alert-danger" id="" style="display:none;">
                    <ul>

                    </ul>
                </div> --}}
{{-- 
                <form method="POST" >
                    @csrf
                    <div class="mt-s2">
                        <label for="" class="form-label">Name</label>
                        <input type="text" name="name" id="name" class="form-control">

                    </div>
                    <div id="userList"></div> --}}
                    {{-- <div class="mt-2">
                        <label for="" class="form-label">Body</label>
                        <input type="text" class="form-control" name="body" id="body">
                    </div> --}}


                </form>



            </div>
        </div>
        {{-- https://www.youtube.com/watch?v=XPtqUWJ44IE&list=PLxZ3SvXewFlCc4QD4g_NpMTaQVzvHBNlq&index=6 --}}
    </div>
</body>
{{-- <script type="text/javascript">
    $("#name").keyup(function() {
        var _token = $("input[name= '_token']").val();
        var name = $(this).val();
        $.ajax({
            type: "POST",
            url: "{{ route('user.autocomplete') }}",
            data: {
                token: _token,
                search: name
                success: function(response) {
                    var html = "<ul class='dropdown-menu'>";
                    $.each(response, function() {
                        html = html + "<li><a href='#'class='dropdown-item'>" + value.name +
                            "</li>"
                    });
                    html = html + "</ul>";
                    $("#userList").html(html)
                    console.log(response);
                }
            }
        })
    });
    $(document).on("click", ".dropdown-menu li", function() {
        $("#name").val($(this).text());
        $("#userList").html(html)
    })
</script> --}}
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
    integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</html>
{{-- <div class="row">
    @foreach ($posts as $item)
        <div class="col-md-4">
            <div class="content_box">
                <h3>{{ $item->title }}</h3>
                <p> {{ $item->body }} </p>
            </div>
        </div>
    @endforeach
</div> --}}
