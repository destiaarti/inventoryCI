<button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#Delete<?php echo $mutasi->id_mutasi?>">
        <i class="fa fa-trash-o "></i> Delete
</button>

<div class="modal modal-danger fade" id="Delete<?php echo $mutasi->id_mutasi?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Menghapus Data</h4>
              </div>
              <div class="modal-body">
                <p>Anda yakin ingin menghapus data ini?</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Keluar</button>
                <a href="<?php echo base_url('mutasi/delete/'.$mutasi->id_mutasi) ?>" class="btn btn-outline pull-right"><i class="fa fa-trash-o"></i> Ya, hapus data ini </a> 
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->