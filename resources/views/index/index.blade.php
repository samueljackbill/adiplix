<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" />

    <title>ADIPLIX</title>
</head>
<body>

    <header class="p-3 text-bg-dark">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                    <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                        <use xlink:href="#bootstrap"></use>
                    </svg>
                </a>

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="{{ route('index.index') }}" class="nav-link px-2 text-white">Home</a></li>
                    <li><a href="{{ route('user.index') }}" class="nav-link px-2 text-white">Pessoas</a></li>
                    <li><a href="{{ route('task.index') }}" class="nav-link px-2 text-white">Tarefas</a></li>
                </ul>

                <div class="text-end">
                    <button type="button" class="btn btn-outline-light me-2" disabled>Login</button>
                </div>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="row mt-4 mb-4">
            <h3 class="text-center">Visão Geral</h3>
            <hr>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-6">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">Padrão</label>
                            </div>
                            <select class="custom-select form-select" id="select_std">
                                <option value="">Escolher...</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">Resultado</label>
                            </div>
                            <select class="custom-select form-select" id="select_res">
                                <option value="">Escolher...</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="mt-2 mb-4">
                    <button id="filter" class="btn btn-sm btn-outline-dark">Filtro</button>
                    <button id="reset_std" class="btn btn-sm btn-outline-dark">Limpar Padrão</button>
                    <button id="reset_res" class="btn btn-sm btn-outline-dark">Limpar Resultado</button>
                    <button id="reset" class="btn btn-sm btn-outline-dark">Limpar</button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="display" id="record_table" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    
    <script>
        function fetch_std() {
            $.ajax({
                url: "{{ route('index.records') }}",
                type: "GET",
                dataType: "json",
                success: function(data) {
                    var stdBody = "";
                    for (var key in data) {
                        stdBody +=
                            `<option value="${data[key]['name']}">${data[key]['name']}</option>`;
                    }
                    $("#select_std").append(stdBody);
                }
            });
        }
        fetch_std();
        // Fetch Result
        function fetch_res() {
            $.ajax({
                url: "{{ route('results') }}",
                type: "GET",
                dataType: "json",
                success: function(data) {
                    var resBody = "";
                    for (var key in data) {
                        resBody += `<option value="${data[key]['result']}">${data[key]['result']}</option>`;
                    }
                    $("#select_res").append(resBody);
                }
            });
        }
        fetch_res();
        // Fetch Records
        function fetch(std, res) {
            $.ajax({
                url: "{{ route('students/records') }}",
                type: "GEt",
                data: {
                    std: std,
                    res: res
                },
                dataType: "json",
                success: function(data) {
                    var i = 1;
                    $('#record_table').DataTable({
                        "data": data.students,
                        "responsive": true,
                        "columns": [{
                                "data": "id",
                                "render": function(data, type, row, meta) {
                                    return i++;
                                }
                            },
                            {
                                "data": "name"
                            },
                            {
                                "data": "standard",
                                "render": function(data, type, row, meta) {
                                    return `${row.standard}th Standard`;
                                }
                            },
                            {
                                "data": "percentage",
                                "render": function(data, type, row, meta) {
                                    return `${row.percentage}%`;
                                }
                            },
                            {
                                "data": "result"
                            },
                            {
                                "data": "created_at",
                                "render": function(data, type, row, meta) {
                                    return moment(row.created_at).format('DD-MM-YYYY');
                                }
                            }
                        ]
                    });
                }
            });
        }
        fetch();
        // Filter
        $(document).on("click", "#filter", function(e) {
            e.preventDefault();
            var std = $("#select_std").val();
            var res = $("#select_res").val();
            if (std !== "" && res !== "") {
                $('#record_table').DataTable().destroy();
                fetch(std, res);
            } else if (std !== "" && res == "") {
                $('#record_table').DataTable().destroy();
                fetch(std, '');
            } else if (std == "" && res !== "") {
                $('#record_table').DataTable().destroy();
                fetch('', res);
            } else {
                $('#record_table').DataTable().destroy();
                fetch();
            }
        });
        // Reset Standard
        $(document).on("click", "#reset_std", function(e) {
            e.preventDefault();
            $("#select_std").html(`<option value="">Choose...</option>`);
            var res = $("#select_res").val();
            if (res == "") {
                $('#record_table').DataTable().destroy();
                fetch();
                fetch_std();
            } else {
                $('#record_table').DataTable().destroy();
                fetch('', res);
                fetch_std();
            }
        });
        // Reset Result
        $(document).on("click", "#reset_res", function(e) {
            e.preventDefault();
            $("#select_res").html(`<option value="">Choose...</option>`);
            var std = $("#select_std").val();
            if (std == "") {
                $('#record_table').DataTable().destroy();
                fetch();
                fetch_res();
            } else {
                $('#record_table').DataTable().destroy();
                fetch(std, '');
                fetch_res();
            }
        });
        // Reset
        $(document).on("click", "#reset", function(e) {
            e.preventDefault();
            $("#select_std").html(`<option value="">Choose...</option>`);
            $("#select_res").html(`<option value="">Choose...</option>`);
            $('#record_table').DataTable().destroy();
            fetch();
            fetch_std();
            fetch_res();
        });
    </script>
</body>
</html>