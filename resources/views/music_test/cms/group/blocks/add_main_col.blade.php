<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">

                <div class="form-group">
                    <label for="title">Название группы</label>
                    <input name="title"
                           id="title"
                           type="text"
                           class="form-control"
                           required>
                </div>

                <div class="form-group">
                    <label for="description">Описание группы</label>
                    <textarea name="description"
                              id="description"
                              class="form-control"
                              rows="10">
                    </textarea>
                </div>

                <div class="form-group">
                    <label for="cover">Загрузка обложки</label>
                    <input name="cover"
                           type="file"
                           id="cover"
                           class="form-control">
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <button form="add" type="submit"
                                class="btn btn-primary btn-block active" role="button" aria-pressed="true">Добавить
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>