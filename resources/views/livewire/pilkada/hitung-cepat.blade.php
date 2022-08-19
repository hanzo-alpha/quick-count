<div {{ $refreshInSeconds ? "wire:poll.{$refreshInSeconds}s" : ''  }}>
    {{--<div>--}}
    @if(auth()->check() && request()->is('home'))
        @include('livewire.pilkada.hitung-cepat-old')
    @else
        <div class="card">
            <div class="card-body d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <div class="avatar bg-rgba-primary m-0 p-25 mr-75 mr-xl-2">
                        <div class="avatar-content">
                            <i class="bx bx-user-voice text-primary font-medium-2"></i>
                        </div>
                    </div>
                    <div class="total-amount">
                        <h5 class="mb-0 text-primary">{{ number_format($totalSuara1,0,',','.') }}</h5>
                        <small class="text-muted">Total Suara Paslon</small>
                    </div>
                </div>
                <div class="conversion-rate">
                    <h2 class="text-primary">{{ number_format($persenSuara1,2) .' %' }}</h2>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <div class="avatar bg-rgba-primary m-0 p-25 mr-75 mr-xl-2">
                        <div class="avatar-content">
                            <i class="bx bx-user-voice text-danger font-medium-2"></i>
                        </div>
                    </div>
                    <div class="total-amount">
                        <h5 class="mb-0 text-danger">{{ number_format($totalSuara2,0,',','.') }}</h5>
                        <small class="text-muted">Suara Kolom Kosong</small>
                    </div>
                </div>
                <div class="conversion-rate">
                    <h2 class="text-danger">{{ number_format($persenSuara2,2) .' %' }}</h2>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <div class="avatar bg-rgba-primary m-0 p-25 mr-75 mr-xl-2">
                        <div class="avatar-content">
                            <i class="bx bxs-user-detail text-success font-medium-2"></i>
                        </div>
                    </div>
                    <div class="total-amount">
                        <h5 class="mb-0 text-success">{{ number_format($partisipan,0,',','.') }}</h5>
                        <small class="text-muted">Partisipan Pemilih</small>
                    </div>
                </div>
                <div class="conversion-rate">
                    <h2 class="text-success">{{ number_format($persenSuara,2) .' %' }}</h2>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <div class="avatar bg-rgba-primary m-0 p-25 mr-75 mr-xl-2">
                        <div class="avatar-content">
                            <i class="bx bx-calculator text-warning font-medium-2"></i>
                        </div>
                    </div>
                    <div class="total-amount">
                        <h5 class="mb-0 text-warning">{{ number_format($totalSuaraSah,0,',','.') }}</h5>
                        <small class="text-muted">Total Suara Sah</small>
                    </div>
                </div>
                <div class="conversion-rate">
                    <h2 class="text-warning">{{ number_format($persenSuaraSah,2) .' %' }}</h2>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <div class="avatar bg-rgba-primary m-0 p-25 mr-75 mr-xl-2">
                        <div class="avatar-content">
                            <i class="bx bx-calculator text-info font-medium-2"></i>
                        </div>
                    </div>
                    <div class="total-amount">
                        <h5 class="mb-0 text-info">{{ number_format($totalSuaraTidakSah,0,',','.') }}</h5>
                        <small class="text-muted">Total Suara Tidak Sah</small>
                    </div>
                </div>
                <div class="conversion-rate">
                    <h2 class="text-info">{{ number_format($persenSuaraTidakSah,2) .' %' }}</h2>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <div class="avatar bg-rgba-primary m-0 p-25 mr-75 mr-xl-2">
                        <div class="avatar-content">
                            <i class="bx bx-calculator text-info font-medium-2"></i>
                        </div>
                    </div>
                    <div class="total-amount">
                        <h5 class="mb-0 text-info">{{ number_format($suaraMasuk,0,',','.') }}</h5>
                        <small class="text-muted">Total Suara Masuk</small>
                    </div>
                </div>
                <div class="conversion-rate">
                    <h2 class="text-info">{{ number_format($persentaseSuaraMasuk,2) .' %' }}</h2>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <div class="avatar bg-rgba-primary m-0 p-25 mr-75 mr-xl-2">
                        <div class="avatar-content">
                            <i class="bx bx-calculator text-info font-medium-2"></i>
                        </div>
                    </div>
                    <div class="total-amount">
                        <h5 class="mb-0 text-info">{{ number_format($suaraBlmMasuk,0,',','.') }}</h5>
                        <small class="text-muted">Total Suara Belum Masuk</small>
                    </div>
                </div>
                <div class="conversion-rate">
                    <h2 class="text-info">{{ number_format($persentaseSuaraBlmMasuk,2) .' %' }}</h2>
                </div>
            </div>
        </div>
    @endif

</div>
