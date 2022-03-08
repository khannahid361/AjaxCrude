<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <title>Ajax Crude</title>
</head>

<body>
    <div class="jumbotron">
        <h2>Teachers</h2>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createTeacher">
            Create Teacher
        </button>
        <br>
        <span id="Success"></span>
        <br>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Designation</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                {{-- gthgh --}}
            </tbody>
        </table>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="createTeacher" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Teacher</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" class="form-control mb-2" id="name" aria-describedby="name"
                            placeholder="Enter Name">
                        <span id="nameHelp" class="form-text text-muted"></span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Designation</label>
                        <input type="text" class="form-control mb-2" id="designation" aria-describedby="emailHelp"
                            placeholder="Enter Designation">
                        <span id="desHelp" class="form-text text-muted"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-outline-success" id="addteacher">Save Teacher</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="editTeacherinfo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Teacher</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="editid" id="editid">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" class="form-control mb-2" id="editname" aria-describedby="name"
                            placeholder="Enter Name">
                        <span id="nameHelpe" class="form-text text-muted"></span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Designation</label>
                        <input type="text" class="form-control mb-2" id="editdesignation" aria-describedby="emailHelp"
                            placeholder="Enter Designation">
                        <span id="desHelpe" class="form-text text-muted"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-outline-success" id="updateTeacher">Update Teacher</button>
                </div>
            </div>
        </div>
    </div>

{{-- delete teacher --}}
    <div class="modal fade" id="deleteTeacherinfo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Teacher</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h3>Are You Sure Want To Delete Teacher ?</h3>
                    <input type="hidden" name="teacher_id" id="teacher_id">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-outline-danger" id="delTeacher">Delete Teacher</button>
                </div>
            </div>
        </div>
    </div>

{{-- delete teacher --}}

    <script src="{{ asset('public/js/jquery.min.js') }}"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function() {
            fetchRecord();

            function fetchRecord() {
                $.ajax({
                    type: "GET",
                    url: "fetchTeachers",
                    dataType: "json",
                    success: function(response) {
                        // console.log(response);
                        $('tbody').empty();
                        $.each(response.teachers, function(key, value) {
                            $('tbody').append(
                                '<tr>\
                                    <td>' + value.id + '</td>\
                                    <td>' + value.name + '</td>\
                                    <td>' + value.designation + '</td>\
                                    <td>\
                                        <button class="editTeacher btn btn-warning" value="' + value.id + '">Edit</button>\
                                        <button class="btn btn-danger deleteTeacher" value="' + value.id + '">Delete</button>\
                                    </td>\
                                </tr>'
                            );
                        });
                    }
                });
            }

            $(document).on('click', '#updateTeacher', function (e) {
                e.preventDefault();
                var tid = $('#editid').val();
                // console.log(tid);
                var data = {
                    'name' : $('#editname').val(),
                    'designation' : $('#editdesignation').val(),
                };
                console.log(data);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "PUT",
                    url: "updateTeacher/"+ tid,
                    data: data,
                    dataType: "json",
                    success: function (response) {
                        if (response.status == 400) {
                            $('#desHelpe').html('');
                            $('#nameHelpe').html('');
                            if (response.errors.name == null) {
                                $('#desHelpe').addClass('text-danger');
                                $('#desHelpe').text(response.errors.designation);
                            } else {
                                $('#desHelpe').removeClass('text-danger');
                            }
                            if (response.errors.designation == null) {
                                $('#nameHelpe').addClass('text-danger');
                                $('#nameHelpe').text(response.errors.name);
                            } else {
                                $('#nameHelpe').removeClass('text-danger');
                            }

                        } else {
                            $('#editTeacherinfo').modal('hide');
                            $('#Success').text(response.message);
                            fetchRecord();
                        }
                    }
                });
            });

            $(document).on('click', '#addteacher', function(e) {
                e.preventDefault();
                // console.log('clicked');
                var data = {
                    'name': $('#name').val(),
                    'designation': $('#designation').val(),
                }
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                // console.log(data);
                $.ajax({
                    type: "POST",
                    url: "teachers",
                    data: data,
                    dataType: "json",
                    success: function(response) {
                        // console.log(response);
                        if (response.status == 400) {
                            $('#desHelp').html('');
                            $('#nameHelp').html('');
                            if (response.errors.name == null) {
                                $('#desHelp').addClass('text-danger');
                                $('#desHelp').text(response.errors.designation);
                            } else {
                                $('#desHelp').removeClass('text-danger');
                            }
                            if (response.errors.designation == null) {
                                $('#nameHelp').addClass('text-danger');
                                $('#nameHelp').text(response.errors.name);
                            } else {
                                $('#nameHelp').removeClass('text-danger');
                            }

                        } else {
                            $('#createTeacher').modal('hide');
                            $('#Success').text(response.message);
                            fetchRecord();
                        }
                    }
                });
            });


            $(document).on('click', '.editTeacher', function(e) {
                e.preventDefault();
                var tid = $(this).val();
                // console.log(tid);
                $('#editTeacherinfo').modal('show');
                $.ajax({
                    type: "GET",
                    url: "editTeacher/" + tid,
                    dataType: "json",
                    success: function(response) {
                        // console.log(response.teacher);
                        $('#editid').val(tid);
                        $('#editname').val(response.teacher.name);
                        $('#editdesignation').val(response.teacher.designation);
                    }
                });
            });

            $(document).on('click', '.deleteTeacher', function (e) {
                e.preventDefault();
                var tid = $(this).val();
                $('#deleteTeacherinfo').modal('show');
                $('#teacher_id').val(tid);
            });
            $(document).on('click', '#delTeacher', function (e) {
                e.preventDefault();
                var tid = $('#teacher_id').val();
                $(this).text('Deleting');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "DELETE",
                    url: "deleteTeacher/"+ tid,
                    success: function (response) {
                        $('#deleteTeacherinfo').modal('hide');
                        $('#Success').text(response.message);
                        fetchRecord();
                        $('#delTeacher').text('Delete Teacher');
                    }
                });
            });
        });
    </script>
</body>

</html>
