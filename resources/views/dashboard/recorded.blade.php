@extends('dashboard.base')

@section('content')

<div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">List Pasien
                            
                                <a href="#" class="btn btn-primary btn-sm float-right">Tambah</a>
                            </h4>
                        </div>
                        <div class="card-body">
 
  

                            <form action="#" method="get">
                                <div class="input-group mb-3 col-md-3 float-right">
                                    <input type="text" id ="term" name="term" class="form-control" placeholder="Cari..." value="">
                                    <div class="input-group-append">
                                        <button class="btn btn-secondary" type="submit">Cari</button>
                                    </div>
                                </div>
                            </form>
                        
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Kartu</th>
                                            <th>Nama</th>
                                            <th>Umur</th>
                                            <th>JK</th>
                                            <th>No. Telepon</th>
                                            <th>Pekerjaan</th>
                                            <th>Alamat</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       
                                        <tr>

                                            <td>
                                                    <a href="#" class="btn btn-warning btn-sm">Edit</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('javascript')

    <script src="{{ asset('js/Chart.min.js') }}"></script>
    <script src="{{ asset('js/coreui-chartjs.bundle.js') }}"></script>
    <script src="{{ asset('js/main.js') }}" defer></script>



    
   

@endsection
