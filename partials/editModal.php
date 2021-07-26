
<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit this Note</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/phpAyush/CRUD_App/index.php" method="POST">
          <input type="hidden" class="snoEdit" id="snoEdit" name="snoEdit">
          <div class="mb-3">
            <label for="titleEdit" class="form-label">Edit Title</label>
            <input type="text" class="form-control" id="titleEdit" name="titleEdit" placeholder="Type Notes title here...">
          </div>
          <div class="mb-3">
            <label for="descEdit" class="form-label">Edit Description</label>
            <textarea class="form-control" id="descEdit" name="descEdit" rows="3" placeholder="Type Notes desc here..."></textarea>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" name="submit" class="btn btn-primary">Update Note</button>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>