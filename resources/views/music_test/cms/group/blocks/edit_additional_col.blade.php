<div class="row justify-content-center mb-3">
    <div class="col-md-12">
        <div class="card">
            <button form="update" type="submit"
                    class="btn btn-dark btn-block active" role="button" aria-pressed="true">Сохранить
            </button>
        </div>
    </div>
</div>
@if($group->exists)
    <div class="row justify-content-center mb-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div>ID: {{ $group->id }}</div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label>Создано</label>
                        <input type="text" value="{{ $group->created_at }}" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label>Изменено</label>
                        <input type="text" value="{{ $group->updated_at }}" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label>Удалено</label>
                        <input type="text" value="{{ $group->deleted_at }}" class="form-control" disabled>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
