<script type="text/javascript">

  function formatSuaraCalon(result) {
    if (result.loading) return result.text;
    let tpl = '<span><b>' + result.text + '</b></span><br><small>' + result.info + '</small>';
    return tpl;
  }

  function formatDefault(result) {
    if (!result.id) return result.text;
    let tpl = $('<span><b>' + result.text + '</b></span><br><small>' + result.info + '</small>');
    return tpl;
  }

  function setTemplate(tipe) {
    let tpl = '';
    switch (tipe) {
      case 'suaracalon':
        tpl = formatSuaraCalon;
        break;
      default:
        tpl = formatDefault;
        break;
    }
    return tpl;
  }

  function renderSelect(selectInit, url, tpl, placehld) {
    return selectInit.select2({
      dropdownParent: $('#modal-form .modal-content'),
      dropdownAutoWidth: true,
      width: '100%',
      closeOnSelect: true,
      selectOnClose: false,
      allowClear: false,
      // minimumInputLength: 3,
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
            i: selectInit.find(':selected').val(),
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
          renderSelect($("#select-paslon"), '{!! route('select.paslon') !!}', setTemplate('suaracalon'),'Cari Pasangan Calon');
          renderSelect($("#select-paslon-add"), '{!! route('select.paslon') !!}', setTemplate('suaracalon'),'Cari Pasangan Calon');
          renderSelect($("#select-tps"), '{!! route('select.tps') !!}', setTemplate('suaracalon'),'Cari TPS');
          renderSelect($("#select-tps-add"), '{!! route('select.tps') !!}', setTemplate('suaracalon'),'Cari TPS');
        },
      });

      $('#modal-form').modal('show');
    })
  });
  </script>
