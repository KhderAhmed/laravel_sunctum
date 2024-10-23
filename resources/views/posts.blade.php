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
    <title>Posts</title>
</head>

<body>

    <div class="container">
        <div class="card mt-5">
            <div class="card-header">
                <h4>Posts List</h4>
            </div>
            <div class="card-body">

                <div class="alert alert-danger" id="" style="display:none;">
                    <ul>

                    </ul>
                </div>

                <form method="POST" action="" id="createpost">
                    @csrf
                    <div class="mt-s2">
                        <label for="" class="form-label">Title</label>
                        <input type="text" name="title" id="title" class="form-control">

                    </div>
                    <div class="mt-2">
                        <label for="" class="form-label">Body</label>
                        <input type="text" class="form-control" name="body" id="body">
                    </div>

                    <div class="mt-2">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>



            </div>
        </div>
        {{-- https://www.youtube.com/watch?v=XPtqUWJ44IE&list=PLxZ3SvXewFlCc4QD4g_NpMTaQVzvHBNlq&index=6 --}}
    </div>
</body>
<script type="text/javascript">
    $("#createpost").submit(function(e) {
        e.preventDefault();
        var title = $("#title").val();
        var body = $("#body").val();
        var _token = $("input{name='_token'}").val(),
            $.ajax({
                type: "POST",
                url: "{{ route('post.store') }}",
                data: {
                    token: _token,
                    title: title,
                    body: body
                },
                success: function(response) {
                    if ($.isEmptyObject(response.errors)) {
                        alert("Post Created")
                    } else {
                        $("#errors").find("ul").html("");
                        $("#errors").css("display", "block");
                        $.each(response.errors, function(key, value) {
                            $("#errors").find("ul").append("<li>"+value+"</li>");
                        });
                    }
                    console.log(response);
                }
                error: function(response) {
                    console.log(response);

                }
            })
    })
</script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
    integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
</script>


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
