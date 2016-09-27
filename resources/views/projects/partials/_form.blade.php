    <div class="form-group">
        <label class="col-md-2 control-label">Name</label>
        <div class="col-md-6">
            <input type="text" class="form-control" name="name" id="name" value="{{ old('name', $project->name) }}">
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-2 col-md-offset-2">
            <button type="submit" class="btn btn-primary">
                Save
            </button>
        </div>
    </div>
