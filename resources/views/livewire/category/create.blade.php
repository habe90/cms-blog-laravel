<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('category.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.category.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="category.name">
        <div class="validation-message">
            {{ $errors->first('category.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.category.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('category.slug') ? 'invalid' : '' }}">
        <label class="form-label required" for="slug">{{ trans('cruds.category.fields.slug') }}</label>
        <input class="form-control" type="text" name="slug" id="slug" required wire:model.defer="category.slug">
        <div class="validation-message">
            {{ $errors->first('category.slug') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.category.fields.slug_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('category.description') ? 'invalid' : '' }}">
        <label class="form-label" for="description">{{ trans('cruds.category.fields.description') }}</label>
        <textarea class="form-control" name="description" id="description" wire:model.defer="category.description" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('category.description') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.category.fields.description_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('category.is_default') ? 'invalid' : '' }}">
        <input class="form-control" type="checkbox" name="is_default" id="is_default" wire:model.defer="category.is_default">
        <label class="form-label inline ml-1" for="is_default">{{ trans('cruds.category.fields.is_default') }}</label>
        <div class="validation-message">
            {{ $errors->first('category.is_default') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.category.fields.is_default_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('category.icon') ? 'invalid' : '' }}">
        <label class="form-label" for="icon">{{ trans('cruds.category.fields.icon') }}</label>
        <input class="form-control" type="text" name="icon" id="icon" wire:model.defer="category.icon">
        <div class="validation-message">
            {{ $errors->first('category.icon') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.category.fields.icon_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('category.order') ? 'invalid' : '' }}">
        <label class="form-label" for="order">{{ trans('cruds.category.fields.order') }}</label>
        <input class="form-control" type="number" name="order" id="order" wire:model.defer="category.order" step="1">
        <div class="validation-message">
            {{ $errors->first('category.order') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.category.fields.order_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('category.is_featured') ? 'invalid' : '' }}">
        <input class="form-control" type="checkbox" name="is_featured" id="is_featured" wire:model.defer="category.is_featured">
        <label class="form-label inline ml-1" for="is_featured">{{ trans('cruds.category.fields.is_featured') }}</label>
        <div class="validation-message">
            {{ $errors->first('category.is_featured') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.category.fields.is_featured_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('category.parent_id') ? 'invalid' : '' }}">
        <label class="form-label" for="parent">{{ trans('cruds.category.fields.parent') }}</label>
        <x-select-list class="form-control" id="parent" name="parent" :options="$this->listsForFields['parent']" wire:model="category.parent_id" />
        <div class="validation-message">
            {{ $errors->first('category.parent_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.category.fields.parent_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>