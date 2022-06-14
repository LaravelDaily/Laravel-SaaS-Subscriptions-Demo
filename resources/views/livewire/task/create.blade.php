<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('task.task') ? 'invalid' : '' }}">
        <label class="form-label required" for="task">{{ trans('cruds.task.fields.task') }}</label>
        <input class="form-control" type="text" name="task" id="task" required wire:model.defer="task.task">
        <div class="validation-message">
            {!! $errors->first('task.task') !!}
        </div>
        <div class="help-block">
            {{ trans('cruds.task.fields.task_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.tasks.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>
