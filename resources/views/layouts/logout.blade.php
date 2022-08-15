<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="{!! route('logout') !!}" method="post">
        <div class="modal-header border-0">
          @csrf
          <h5 class="modal-title text-danger">Ready to Leave?</h5>
          <button class="close text-danger" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer border-0">
          <button name="submit" class="btn btn-danger btn-icon-split">
            <span class="text lead py-0 px-3">Logout</span>
            <span class="icon py-1 px-2">
              <span class="bi bi-box-arrow-right"></span>
            </span>
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
