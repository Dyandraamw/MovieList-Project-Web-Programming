<div class="mb-3 text-white">
    <label for="title" class="form-label ">Title</label>
    <input type="text" class="form-control bg-secondary border-0 text-white" id="title" aria-describedby="title" name="title" value="{{ $item->title }}">
  </div>

  <div class="mb-3 text-white">
      <label for="description" class="form-label ">Description</label>
      <input type="text" class="form-control bg-secondary border-0 text-white" id="description" aria-describedby="description" style="height: 100px" name="description" value="{{ $item->description }}">
  </div>

  <div class="mb-3 text-white">
      <label for="genre" class="form-label ">Genre</label>
      <br>
      <label for="genre" class="me-5"><input type="checkbox" name="genre[]" value="Fantasy"/>Fantasy</label>
      <label for="genre" class="me-5"><input type="checkbox" name="genre[]" value="Children"/>Children</label>
      <label for="genre" class="me-5"><input type="checkbox" name="genre[]" value="Adventure"/>Adventure</label>
      <label for="genre" class="me-5"><input type="checkbox" name="genre[]" value="Dark"/>Dark</label>
  </div>

  <div class="mb-3 text-white">
      <label for="Actors" class="form-label ">Actors</label>
      <br>
      <ul class="list-group text-white">
          @foreach ($actors as $actor)
              <li class="list-group-item bg-secondary text-white">
                  <input class="form-check-input me-1" type="checkbox" value="{{ $actor->id }}" id="checkbox" name="actor[]">
                  <label class="form-check-label" for="checkbox">{{ $actor->name }}</label>
              </li>
          @endforeach
      </ul>
  </div>

  <div class="mb-3 text-white">
      <label for="characterName" class="form-label ">Character Name</label>
      <input type="text" class="form-control bg-secondary border-0 text-white" id="characterName" aria-describedby="characterName" name="characterName[]" value="{{ $item->characterName[0] }}" >
  </div>

  <div class="mb-3 text-white">
      <label for="director" class="form-label ">Director</label>
      <input type="text" class="form-control bg-secondary border-0 text-white" id="director" aria-describedby="director" name="director" value="{{ $item->director }}" >
    </div>

  <div class="mb-3 text-white">
      <label for="releaseDate" class="form-label">Release Date</label>
      <input type="date" class="form-control bg-secondary border-0 text-white" id="releaseDate" name="releaseDate" value="{{ $item->releaseDate }}">
  </div>

  <div class="mb-3 text-white">
      <label for="thumbnail" class="form-label">Thumbnail URL</label>
      <input class="form-control bg-secondary border-0 text-white" type="file" id="thumbnail" aria-describedby="thumbnail" name="thumbnail" value="{{ $item->thumbnail }}">
  </div>

  <div class="mb-3 text-white">
      <label for="background" class="form-label">Background URL</label>
      <input class="form-control bg-secondary border-0 text-white" type="file" id="background" aria-describedby="background" name="background" value="{{ $item->background }}">
  </div>

  <button type="submit" class="btn btn-danger col-5">Update</button>
