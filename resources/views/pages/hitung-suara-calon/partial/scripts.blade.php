<script type="text/javascript">
  function formatSuaraCalon(result) {
    if (result.loading) return result.text;
    let tpl = '<span><b>' + result.text + '</b></span><br><small>' + result.info + '</small>';
    return tpl;
  }

  function formatKota(result) {
    if (result.loading) return result.text;
    let tpl = '<span><b>' + result.text + '</b></span><br><small>' + result.name
      + '</small>'
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
      case 'suaracalon':
        tpl = formatSuaraCalon;
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

  function kecamatanChange(param) {
    if (param === 'edit') {
      $("#select-kecamatan-edit").change(function () {
        let selectDesa = $("#select-desa-edit");
        selectDesa.prop("disabled", false);
        return renderSelect(selectDesa, "{!! route('select.desa') !!}", setTemplate('kota'), 'Pilih Kelurahan/Desa', $("#select-kecamatan-edit").find
        (':selected').val());
      });
    } else {
      $("#select-kecamatan-add").change(function () {
        let selectDesa = $("#select-desa-add");
        selectDesa.prop("disabled", false);
        return renderSelect(selectDesa, "{!! route('select.desa') !!}", setTemplate('kota'), 'Pilih Kelurahan/Desa', $("#select-kecamatan-add").find
        (':selected').val());
      });
    }
  }

  function desaChange(param) {
    if (param !== 'edit') {
      $("#select-desa-add").change(function () {
        let fieldTps = $("#tps-add");
        fieldTps.prop("disabled", false);
      });
    } else {
      $("#select-desa-edit").change(function () {
        let fieldTps = $("#tps-edit");
        fieldTps.prop("disabled", false);
      });
    }
  }

  function tpsChange(param) {
    let id = $("#tps-add");
    if (param === 'edit') {
      id = $("#tps-edit");
    }

    id.focusin(function () {
      let suara1 = $("#suara1");
      suara1.prop("disabled", false);
    });
  }

  function tpsEditChange() {
    $("#tps-edit").focusin(function () {
      let suara1 = $("#suara1");
      suara1.prop("disabled", false);
    });
  }

  function suara1Change() {
    $("#suara1").focusin(function () {
      let suara2 = $("#suara2");
      suara2.prop("disabled", false);
    });
  }

  function suara2Change() {
    $("#suara2").focusin(function () {
      let status = $("#status");
      status.prop("disabled", false);
    });
  }

  function disabledSelect() {
    $("#tps-add").prop("disabled", true);
    $("#tps-edit").prop("disabled", true);
    $("#status").prop("disabled", true);
    $("#status-edit").prop("disabled", true);
    $("#calon-1").prop("disabled", true);
    $("#calon-2").prop("disabled", true);
    $("#suara1").prop("disabled", true);
    $("#suara2").prop("disabled", true);
    $("#select-desa-add").prop("disabled", true);
    $("#select-desa-edit").prop("disabled", true);
  }

  function renderSelect(selectInit, url, tpl, placehld, param) {
    return selectInit.select2({
      dropdownParent: $('#modal-form .modal-content'),
      dropdownAutoWidth: true,
      width: '100%',
      closeOnSelect: true,
      selectOnClose: false,
      allowClear: true,
      // minimumInputLength: 1,
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

      $('#modalStyle').addClass('modal-lg');
      $('#modalTitle').text(title);

      $.ajax({
        url: url,
        dataType: 'html',
        success: function (response) {
          $('#modal-fill').html(response);
          // disabledSelect();
          renderSelect($("#select-kecamatan-add"), '{!! route('select.kecamatan') !!}', setTemplate('kota'), 'Pilih Kecamatan');
          renderSelect($("#select-kecamatan-edit"), '{!! route('select.kecamatan') !!}', setTemplate('kota'), 'Pilih Kecamatan');
          renderSelect($("#select-desa-add"), '{!! route('select.desa') !!}', setTemplate('kota'), 'Pilih Kelurahan/Desa');
          renderSelect($("#select-desa-edit"), '{!! route('select.desa') !!}', setTemplate('kota'), 'Pilih Kelurahan/Desa');
          kecamatanChange();
          kecamatanChange('edit');

          desaChange();
          desaChange('edit');

          tpsChange();
          tpsChange('edit');
          suara1Change();
          suara2Change();
        },
      });

      $('#modal-form').modal('show');
    })
  });
</script>
