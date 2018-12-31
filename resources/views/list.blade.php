<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ajax To Do list Project</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
          crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 col-lg-6 mt-5">
                <div class="card">
                    <h5 class="card-header">Ajax ToDo List
                        <a href="" id="addNew" data-toggle="modal" data-target="#listModal">
                            <i class="fa fa-plus float-right"></i>
                        </a>
                    </h5>

                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item ourItem" data-toggle="modal" data-target="#listModal">Cras justo odio</li>
                            <li class="list-group-item ourItem" data-toggle="modal" data-target="#listModal">Dapibus ac facilisis in</li>
                            <li class="list-group-item ourItem" data-toggle="modal" data-target="#listModal">Morbi leo risus</li>
                            <li class="list-group-item ourItem" data-toggle="modal" data-target="#listModal">Porta ac consectetur ac</li>
                            <li class="list-group-item ourItem" data-toggle="modal" data-target="#listModal">Vestibulum at eros</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @csrf
    <!-- Modal -->
    <div class="modal fade" id="listModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="title">Add New Item</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p><input type="text" class="form-control" placeholder="add new item" id="addItem"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" id="delete"  data-dismiss="modal" style="display: none">Delete</button>
                    <button type="button" class="btn btn-primary" id="saveChanges" style="display: none">Save changes</button>
                    <button type="submit" class="btn btn-success" id="addButton">Add Item</button>
                </div>
            </div>
        </div>
    </div>



<script
    src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
        integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
        crossorigin="anonymous">
</script>
<script>
    $(document).ready(function () {
        //add button
        $('#addNew').click(function (e) {
            $("#title").text('Add New Item');
            $("#addItem").val('');
            $("#saveChanges").hide();
            $("#addButton").show();
            $("#delete").hide();
        });
        // list item click function
        $('.ourItem').each(function () {
            $(this).click(function (e) {
                var text = $(this).text();
                $("#title").text('Edit Item');
                $("#delete").show();
                $("#saveChanges").show();
                $("#addButton").hide();
                $("#addItem").val(text);
                console.log(text);
            })
        });
        // click add new button and send data form the input box in modal
        $("#addButton").click(function (e) {
            var text = $("#addItem").val();
            $.post('list',{'text': text,'_token':$('input[name=_token]').val()}, function (data) {
                console.log(data);
            });

        });


    });
</script>
</body>
</html>
