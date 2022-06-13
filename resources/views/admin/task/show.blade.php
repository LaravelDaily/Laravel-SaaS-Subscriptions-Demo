@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.task.title_singular') }}:
                    {{ trans('cruds.task.fields.id') }}
                    {{ $task->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.task.fields.id') }}
                            </th>
                            <td>
                                {{ $task->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.task.fields.task') }}
                            </th>
                            <td>
                                {{ $task->task }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('task_edit')
                    <a href="{{ route('admin.tasks.edit', $task) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.tasks.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection