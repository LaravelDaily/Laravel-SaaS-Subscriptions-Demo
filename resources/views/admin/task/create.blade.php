@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.create') }}
                    {{ trans('cruds.task.title_singular') }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('task.create')
        </div>
    </div>
</div>
@endsection