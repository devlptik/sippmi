@extends('layouts.admin')
@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => route('admin.home'),
        'Fakultas' => '#'
    ]) !!}
@stop
@section('toolbar')
    @can('fakultum_manage')
        {!! cui_toolbar_btn(route('admin.fakulta.create'), 'cil-plus', 'Tambah Fakultas') !!}
    @endcan
@stop
@section('content')
<div class="card">
    <div class="card-header font-weight-bold">
        <i class="cil-list"></i> List Fakultas
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-outline table-striped table-hover datatable datatable-Fakultum" style="width: 100%">
                <thead>
                    <tr class="thead-light">
                        <th>
                            {{ trans('cruds.fakultum.fields.nama') }}
                        </th>
                        <th>
                            {{ trans('cruds.fakultum.fields.singkatan') }}
                        </th>
                        <th class="text-center">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($fakulta as $key => $fakultum)
                        <tr data-entry-id="{{ $fakultum->id }}">
                            <td>
                                {{ $fakultum->nama ?? '' }}
                            </td>
                            <td>
                                {{ $fakultum->singkatan ?? '' }}
                            </td>
                            <td class="text-center">
                                @can('fakultum_manage')
                                    {!! cui()->btn_edit(route('admin.fakulta.edit', $fakultum->id)) !!}
                                    {!! cui()->btn_delete(route('admin.fakulta.destroy', $fakultum->id), "Anda yakin akan menghapus data Program Studi ini?") !!}
                                @endcan
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('fakultum_manage')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.fakulta.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  $('.datatable-Fakultum:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection
