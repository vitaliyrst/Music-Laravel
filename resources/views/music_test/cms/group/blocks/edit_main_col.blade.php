<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label for="title">Название исполнителя</label>
                    <input name="title"
                           value="{{ $group->title }}"
                           id="title"
                           type="text"
                           class="form-control"
                           required>
                </div>
                <div class="form-group">
                    <label for="cover">Загрузка обложки</label>
                    <input name="cover"
                           value="{{ $group->cover }}"
                           type="file"
                           id="cover"
                           class="form-control">
                </div>
                <div class="form-group">
                    <img class="group-img img-fluid" src="{{ $group->cover }}">
                </div>
                <div class="form-group">
                    <label for="description">Описание группы</label>
                    <textarea name="description"
                              id="description"
                              class="form-control"
                              rows="10">{{ $group->description }}
                    </textarea>
                </div>
            </div>
        </div>
    </div>
</div>