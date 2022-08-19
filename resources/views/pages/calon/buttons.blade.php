@if($format === 'd')
    <div class="dropup">
    <span class="bx bx-dots-vertical-rounded font-medium-2 dropdown-toggle nav-hide-arrow cursor-pointer"
          data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="menu">
    </span>
        <div class="dropdown-menu dropdown-menu-right">
          {{--        @can($input['role'])--}}
{{--          <a class="dropdown-item modal-loader" title="HITUNG SUARA CALON" href="{{ $input['url'] }}">--}}
{{--            <i class="bx bx-calculator mr-1"></i> {{ __('Hitung Suara')--}}
{{--            }}</a>--}}
          {{--        @endcan--}}
            {{--        @can($edit['role'])--}}
            <a class="dropdown-item modal-loader" data-toggle="modal"
               data-target="#modal-edit" id="btnEditModal" data-url="{{ $edit['url'] }}" title="EDIT DATA CALON" href="#">
                <i class="bx bx-edit-alt mr-1"></i> {{ __('Edit Data Calon')
            }}</a>
            {{--        @endcan--}}
            {{--        @can($delete['role'])--}}
            <form method="POST" action="{{ $delete['url'] }}" style="display: inline">
                @method('DELETE')
                @csrf
                <button title="Hapus Data TPS" class="dropdown-item" type="button"
                        onclick="confirm('{{ __('Apa anda yakin ingin menghapus Calon ini?') }}') ? this.parentElement.submit() : ''">
                    <i class="bx bx-trash mr-1"></i>
                    {{ __('Hapus TPS') }}
                </button>
            </form>
            {{--        @endcan--}}
        </div>
    </div>
@else
    <div class="d-flex inline-flex align-items-md-center">
        <a class="btn btn-link p-0 modal-loader" data-toggle="modal"
           data-target="#modal-edit" id="btnEditModal" data-url="{{ $edit['url'] }}" title="EDIT DATA CALON" href="#">
            <i class="badge-circle badge-circle-light-secondary bx bx-edit-alt"></i>
            {{--        {{ __('Edit Data Tps') }}--}}
        </a>
        <form method="post" action="{{ $delete['url'] }}" style="display: inline">
            @method('DELETE')
            @csrf
            <button title="Hapus Data TPS" class="btn btn-link p-0" type="button"
                    onclick="confirm('{{ __('Apa anda yakin ingin menghapus Calon ini?') }}') ? this.parentElement.submit() : ''">
                <i class="badge-circle badge-circle-light-danger bx bx-trash"></i>
                {{--            {{ __('Hapus TPS') }}--}}
            </button>
        </form>
    </div>

@endif

