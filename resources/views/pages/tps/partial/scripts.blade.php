<script type="text/javascript">

    function formatKota(result) {
        if (result.loading) return result.text;
        let tpl = '<span><b>' + result.text + '</b></span><br><small>' + result.name
            + '</small>'
        return tpl;
    }

    function formatProvinsi(result) {
        if (result.loading) return result.text;
        let tpl = '<span><b>' + result.text + '</b></span>';
        return tpl;
    }

    function formatDefault(result) {
        if (!result.id) return result.text;
        let tpl = $('<span><b>' + result.text + '</b></span>');
        return tpl;
    }

    function setTemplate(tipe) {
        let tpl = '';
        switch (tipe) {
            case 'provinsi':
                tpl = formatProvinsi;
                break;
            case 'kota':
                tpl = formatKota;
                break;
            default:
                tpl = formatDefault;
                break;
        }
        return tpl;
    }

    // Loading remote data
    function provinsiChange() {
        let selectKota = $("#select-kota-add");
        $("#select-provinsi-add").change(function () {
            selectKota.prop("disabled", false);
            return renderSelect(selectKota, "{!! route('select.kota') !!}", setTemplate('kota'), 'Pilih Provinsi', $("#select-provinsi-add").find(':selected')
                .val());
        });
    }

    function kotaChange() {
        $("#select-kota-add").change(function () {
            let selectKecamatan = $("#select-kecamatan-add");
            selectKecamatan.prop("disabled", false);
            return renderSelect(selectKecamatan, "{!! route('select.kecamatan') !!}", setTemplate('kota'), 'Pilih Kecamatan', $("#select-kota-add")
                .find(':selected').val());
        });
    }

    function kecamatanChange() {
        $("#select-kecamatan-add").change(function () {
            let selectDesa = $("#select-desa-add");
            selectDesa.prop("disabled", false);
            return renderSelect(selectDesa, "{!! route('select.desa') !!}", setTemplate('kota'), 'Pilih Kelurahan/Desa', $("#select-kecamatan-add").find
            (':selected').val());
        });
    }

    function disabledSelect() {
        $("#select-kota-add").prop("disabled", true);
        $("#select-kecamatan-add").prop("disabled", true);
        $("#select-desa-add").prop("disabled", true);
    }

    function renderSelect(selectInit, url, tpl, placehld, param) {
        return selectInit.select2({
            dropdownParent: $('#modal-form .modal-content'),
            dropdownAutoWidth: true,
            width: '100%',
            closeOnSelect: true,
            selectOnClose: true,
            allowClear: false,
            minimumInputLength: 1,
            // maximumInputLength: 20,
            minimumResultsForSearch: 15,
            placeholder: placehld,
            ajax: {
                url: url,
                delay: 250,
                dataType: 'json',
                data: function (params) {
                    let query = {
                        q: params.term,
                        i: param,
                        type: 'public',
                        page: params.page || 1
                    };
                    return query;
                },
                processResults: function (data, params) {
                    params.page = params.page || 1;

                    return {
                        results: data.results,
                        pagination: {
                            more: (params.page * 15) < data.total_count
                        }
                    };
                },
                cache: true
            },
            escapeMarkup: function (markup) {
                return markup;
            },
            templateResult: tpl,
        });
    }

    /* Modal Show Global */
    $(document).ready(function () {
        $('body').on('click', '.modal-loader', function (e) {
            e.preventDefault();

            let me = $(this),
                url = me.data('url'),
                title = me.attr('title');

            $('#modalTitle').text(title);

            $.ajax({
                url: url,
                dataType: 'html',
                success: function (response) {
                    $('#modal-fill').html(response);
                    disabledSelect();
                    renderSelect($("#select-provinsi-add"), '{!! route('select.prov') !!}', setTemplate('provinsi'), 'Pilih Provinsi');
                    renderSelect($("#select-provinsi-edit"), '{!! route('select.prov') !!}', setTemplate('provinsi'), 'Pilih Provinsi');
                    provinsiChange();
                    kotaChange();
                    kecamatanChange();
                },
            });

            $('#modal-form').modal('show');
        })
    });
</script>
