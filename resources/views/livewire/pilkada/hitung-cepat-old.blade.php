<div class="row">
    <div class="col-xl-3 col-md-7 col-sm-9">
        <div class="card text-center">
            <div class="card-content">
                <div class="card-body">
                    <div class="badge-circle badge-circle-lg badge-circle-light-warning mx-auto my-1">
                        <i class="bx bxs-user font-medium-5"></i>
                    </div>
                    <p class="text-muted mb-0 line-ellipsis">Total Suara Paslon 1</p>
                    <h2 class="mb-0">{{ number_format($totalSuara1,0,',','.') }}</h2>
                    <h3 class="text-bold-500 text-danger">{{ number_format($persenSuara1,2) .' %' }}</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-7 col-sm-9">
        <div class="card text-center">
            <div class="card-content">
                <div class="card-body">
                    <div class="badge-circle badge-circle-lg badge-circle-light-danger mx-auto my-1">
                        <i class="bx bx-user font-medium-5"></i>
                    </div>
                    <p class="text-muted mb-0 line-ellipsis">Total Suara Paslon 2</p>
                    <h2 class="mb-0">{{ number_format($totalSuara2,0,',','.') }}</h2>
                    <h3 class="text-bold-500 text-danger"> {{ number_format($persenSuara2,2).' %' }}</h3>

                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-7 col-sm-9">
        <div class="card text-center">
            <div class="card-content">
                <div class="card-body">
                    <div class="badge-circle badge-circle-lg badge-circle-light-info mx-auto my-1">
                        <i class="bx bx-calculator font-medium-5"></i>
                    </div>
                    <p class="text-muted mb-0 line-ellipsis">Partisipan Pemilih</p>
                    <h2 class="mb-0">{{ number_format($partisipan,0,',','.') }}</h2>
                    <h3 class="text-bold-500 text-danger">{{ number_format($persenSuara,2) .'%' }}</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-7 col-sm-9">
        <div class="card text-center">
            <div class="card-content">
                <div class="card-body">
                    <div class="badge-circle badge-circle-lg badge-circle-light-success mx-auto my-1">
                        <i class="bx bx-calculator font-medium-5"></i>
                    </div>
                    <p class="text-muted mb-0 line-ellipsis">Total Suara Sah / Tidak Sah</p>
                    <h2 class="mb-0">{{ number_format($totalSuaraSah,0,',','.') }} / {{ number_format($totalSuaraTidakSah,0,',','.') }}</h2>
                    <h3 class="text-bold-500 text-danger">{{ number_format($persenSuara,2) .'%' }}</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-7 col-sm-9">
        <div class="card text-center">
            <div class="card-content">
                <div class="card-body">
                    <div class="badge-circle badge-circle-lg badge-circle-light-success mx-auto my-1">
                        <i class="bx bx-calculator font-medium-5"></i>
                    </div>
                    <p class="text-muted mb-0 line-ellipsis">Persentase Suara Masuk</p>
                    <h2 class="mb-0">{{ number_format($suaraMasuk,0,',','.') }}</h2>
                    <h3 class="text-bold-500 text-danger">{{ number_format($persentaseSuaraMasuk,2) .'%' }}</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-7 col-sm-9">
        <div class="card text-center">
            <div class="card-content">
                <div class="card-body">
                    <div class="badge-circle badge-circle-lg badge-circle-light-success mx-auto my-1">
                        <i class="bx bx-calculator font-medium-5"></i>
                    </div>
                    <p class="text-muted mb-0 line-ellipsis">Persentase Suara Belum Masuk</p>
                    <h2 class="mb-0">{{ number_format($suaraBlmMasuk,0,',','.') }}</h2>
                    <h3 class="text-bold-500 text-danger">{{ number_format($persentaseSuaraBlmMasuk,2) .'%' }}</h3>
                </div>
            </div>
        </div>
    </div>
</div>
