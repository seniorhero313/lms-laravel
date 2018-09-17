@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <div class="header-title">
        <h4>@lang('global.internal-notifications.title')</h4>
        @can('internal_notification_create')
            <a href="{{ route('admin.internal_notifications.create') }}" class="btn-floating btn-small waves-effect waves-light grey"><i class="material-icons">add</i></a>
        @endcan
    </div>

    <div class="card">

        <div class="card-content">
            <div class="title">
                <h5>@lang('global.app_list')</h5>
            </div>
            <table class="striped responsive-table {{ count($internal_notifications) > 0 ? 'datatable' : '' }} @can('internal_notification_delete') dt-select @endcan">
                <thead>
                    <tr>
                        <th>@lang('global.app_order')</th>
                        @can('internal_notification_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang('global.internal-notifications.fields.text')</th>
                        <th>@lang('global.internal-notifications.fields.link')</th>
                        <th>@lang('global.internal-notifications.fields.users')</th>
                                                <th>&nbsp;</th>

                    </tr>
                </thead>
                
                <tbody>
                    @if (count($internal_notifications) > 0)
                        @foreach ($internal_notifications as $internal_notification)
                            <tr data-entry-id="{{ $internal_notification->id }}">
                                <td>1</td>
                                @can('internal_notification_delete')
                                    <td></td>
                                @endcan

                                <td field-key='text'>{{ $internal_notification->text }}</td>
                                <td field-key='link'>{{ $internal_notification->link }}</td>
                                <td field-key='users'>
                                    @foreach ($internal_notification->users as $singleUsers)
                                        <span class="label label-info label-many">{{ $singleUsers->name }}</span>
                                    @endforeach
                                </td>
                                <td class="actions">
                                    <div class="buttons d-flex justify-content-end">
                                        @can('internal_notification_view')
                                        <a href="{{ route('admin.internal_notifications.show',[$internal_notification->id]) }}" class="waves-effect waves-light btn-small btn-square amber"><i class="material-icons">remove_red_eye</i></a>
                                        @endcan
                                        @can('internal_notification_edit')
                                        <a href="{{ route('admin.internal_notifications.edit',[$internal_notification->id]) }}" class="waves-effect waves-light btn-small btn-square blue"><i class="material-icons">edit</i></a>
                                        @endcan
                                        @can('internal_notification_delete')
                                        {!! Form::open(array(
                                            'style' => 'display: inline-block;',
                                            'method' => 'DELETE',
                                            'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                            'route' => ['admin.internal_notifications.destroy', $internal_notification->id])) !!}
                                        {!! Form::button('<i class="fa fa-trash-o"></i>', ['class'=>'waves-effect waves-light btn-small btn-square red', 'type'=>'submit']) !!}
                                        {!! Form::close() !!}
                                        @endcan
                                    </div>
                                </td>

                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="8">@lang('global.app_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('internal_notification_delete')
            window.route_mass_crud_entries_destroy = '{{ route('admin.internal_notifications.mass_destroy') }}';
        @endcan

    </script>
@endsection