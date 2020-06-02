@extends('layouts.admin')
@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => route('admin.home'),
        'Permission' => '#'
    ]) !!}
@stop
@section('toolbar')
    @can('permission_manage')
        {!! cui_toolbar_btn(route('admin.permissions.create'), 'cil-plus', 'Tambah Permission') !!}
    @endcan
@endsection
@section('content')
    <div class="card">
        <div class="card-header font-weight-bold">
        <i class="cil-list"></i> {{ trans('global.list') }} {{ trans('cruds.permission.title_singular') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-outline table-striped table-hover datatable datatable-Permission" style="width: 100%" >
                    <thead>
                        <tr class="thead-light text-center">
                            <th>
                                {{ trans('cruds.permission.fields.title') }}
                            </th>
                            <th>
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($permissions as $key => $permission)
                        <tr data-entry-id="{{ $permission->id }}">
                            <td>
                                {{ $permission->title ?? '' }}
                            </td>
                            <td class="text-center">
                                @can('permission_view')
                                    {!! cui()->btn_view(route('admin.permissions.show', $permission->id)) !!}
                                @endcan

                                @can('permission_manage')
                                    {!! cui()->btn_delete(route('admin.permissions.destroy', $permission->id), "Anda yakin akan menghapus data Permission ini?") !!}
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
                @can('permission_manage')
            let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
            let deleteButton = {
                text: deleteButtonTrans,
                url: "{{ route('admin.permissions.massDestroy') }}",
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
            $('.datatable-Permission:not(.ajaxTable)').DataTable({ buttons: dtButtons })
            $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });
        })

    </script>
@endsection
