<div class="mb-3">
    <label for="login" class="form-label">Title<span class="text-danger">*</span></label>
    <input type="text"  class="form-control" id="title" name="title" placeholder="Enter Title">
    @error('title')
    <span class="text-danger">{{ $message }}</span>
  @enderror
</div>
<div class="mb-3">
    <label for="description" class="form-label">Description<span class="text-danger">*</span></label>
    <textarea name="description" id="description" class="form-control"></textarea>
    @error('description')
      <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
  <label for="status">Status <span class="text-danger">*</span></label>
  <div class="form-check">
    <input class="form-check-input" type="radio" name="status" id="status" value="inprogress">
    <label class="form-check-label" for="status">
Inprogress    </label>
  </div>
  <div class="form-check">
    <input class="form-check-input" type="radio" name="status" id="status"  value="completed">
    <label class="form-check-label" for="status">
      completed    </label>
  </div>
</div>

