<div class="form-group">
    <div class="col-md-10">
        <textarea class="form-control" name="description" id="description" rows="5">{{
            old('description', $task->description) }}</textarea>
    </div>
    <div class="col-md-2">
        <button type="submit" class="btn btn-primary" title="Save task">
            Save
        </button>
    </div>
</div>
