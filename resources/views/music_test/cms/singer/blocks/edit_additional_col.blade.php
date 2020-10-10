<div class="row justify-content-center mb-3">
    <div class="col-md-12">
        <div class="card">
            <button form="update" type="submit"
                    class="btn btn-dark btn-block active" role="button" aria-pressed="true">Сохранить
            </button>
        </div>
    </div>
</div>
@if($singer->exists)
    <div class="row justify-content-center mb-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div>ID: {{ $singer->id }}</div>
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
                        <input type="text" value="{{ $singer->created_at }}" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label>Изменено</label>
                        <input type="text" value="{{ $singer->updated_at }}" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label>Удалено</label>
                        <input type="text" value="{{ $singer->deleted_at }}" class="form-control" disabled>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mt-3">
                <div class="col-md-12">
                    <div class="card">
                        <button form="delete" type="submit"
                                class="btn btn-dark btn-block active" role="button" aria-pressed="true">Удалить
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif