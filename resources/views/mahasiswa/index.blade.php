<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">

    <style>
        body {
            margin-top: 40px;
            margin-left: 0;
            font-family: Montserrat;
        }
    </style>
</head>

<body>
    <div class="container">
        <form action="POST">
            <div class="card">
                <div class="card-header bg-secondary text-white">
                    DATA MAHASISWA
                </div>
                <br>
                <div class="card-body">
                    <!-- LOKASI TEXT PENCARIAN
                    <form>
                        <div class="input-group mb-3">
                            <input type="search" class="form-control" name="search" id="search" placeholder="Masukkan Kata Kunci" aria-label="Masukkan Kata Kunci" aria-describedby="button-addon2">
                            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Cari</button>
                        </div>
                    </form> -->
                    <a class="btn btn-primary btn-sm" href="{{ url('mahasiswa/create') }}">+ Tambah Data</a>
                    <br>
                    <br>
                    <table class="table" id="myTable">
                        <thead>
                            <tr>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Jenis Kelamin</th>
                                <th>Aksi</th>
                                <th>Sertifikat</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key=>$v)

                            <tr>
                                <td>{{$v->id}}</td>
                                <td>{{$v->nama}}</td>
                                <td>{{$v->alamat}}</td>
                                <td>{{$v->jk}}</td>
                                <td>
                                    <a class="btn btn-warning btn-sm" href="{{ url('mahasiswa/'.$v->id.'/edit') }}">Edit</a>
                                    <!-- <a class="btn btn-danger btn-sm" href="{{ url('delete/'.$v->id) }}" type="submit" onsubmit="return confirm('Hapus?')" class="d-inline">Delete</a> -->

                                    <form action="{{ url('delete/'.$v->id) }}" method="DELETE" class="d-inline" onsubmit="return confirm('Anda yakin ingin menghapus?')">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        <!-- <a class="btn btn-danger btn-sm" type="submit" class="d-inline">Delete</a> -->
                                    </form>
                                </td>
                                <td><a class="btn btn-success btn-sm" href="{{ url('sertifikat/'.$v->id) }}">Print</a></td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </form>
    </div>
    <!-- SCRIPT JAVASCRIPT -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/dataTables.jqueryui.min.js"></script>
    
    <script>
        $(document).ready( function () {
        $('#myTable').DataTable();
        } );
    </script>
</body>

</html>