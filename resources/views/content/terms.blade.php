<main id="main" class="main">
    <div class="content ">
        <div class="card">
            <div class="card-header mb-3">
                <div class="row">
                    <div class="col-md-6 g-3">
                        <h4 class="card-title">
                            Category List
                        </h4>
                    </div>
                    <div class="col-md-6 text-end">
                        <div class="dropdown ms-auto">
                            <a href="#" data-bs-toggle="dropdown" class="btn btn-primary dropdown-toggle"
                                aria-haspopup="true" aria-expanded="false">Actions</a>
                            <div class="dropdown-menu dropdown-menu-end" style="margin: 0px;">
                                <a href="{{ route('/add-terms') }}" class="dropdown-item"><i class="fa fa-plus"
                                        aria-hidden="true"></i>Add Terms</a>
                                <!-- <a href="javascript:void(0)" class="dropdown-item"><i class="fa fa-trash"
                                        aria-hidden="true"></i>Delete Category</a> -->
                                <button type="button" class="dropdown-item" value="categoryMultiTrash" id="multipleDeleteTrash" onclick="_trashMultiModal(undefined,'categoryMultiTrash');"  >
                                <i class="fa fa-trash" aria-hidden="true"></i>Delete Category</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive" tabindex="1" style="overflow: hidden; outline: none;">
                    <table class="table table-custom table-lg mb-0" id="example">
                        <thead>
                            <tr>
                                <th class="w-1">
                                    <input class="form-check-input select-all" type="checkbox"
                                        data-select-all-target="#example" id="defaultCheck1">
                                </th>
                                <th>S.N.</th>
                                <th>Term Name</th>
                                <th>Status</th>
                                <th>Created On</th>
                                <th>Updated On</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                //print_r($data);die;
                                $i = 1;
                                if(isset($termdata)){
                                    foreach ($termdata as $row) {
                                    $termname = $row->termName;
                                    $status = $row->status;
                                    if($status == 0){
                                        $status = "Trashed";
                                    }elseif ($status == 1) {
                                        $status = "Published";
                                    }elseif ($status == 2) {
                                        $status = "Unpublished";
                                    }else{
                                        $status = "Unpublished";
                                    }
                            ?>
                            <tr>
                                <td>
                                    <input class="form-check-input multiDeleteCheckBox"  name="multiDeleteCheckBox" value="39"  type="checkbox">
                                </td>
                                <td>{{ $i++ }}</td>
                                <td>{{ $termname }}</td>
                                <td>
                                    <button class="badge bg-success border-0" data-bs-toggle="modal" data-bs-target="#basicModal">{{ $status }}</button>
                                 </td>
                                <td>03/22/2023</td>
                                <td>
                                    <span class="badge bg-info">Not yet Updated</span>
                                </td>
                                <td class="text-end">
                                    <div class="d-flex">
                                        <div class="dropdown ms-auto">
                                            <a href="#" data-bs-toggle="dropdown" class="btn btn-floating"
                                                aria-haspopup="true" aria-expanded="false">
                                                <i class="bi bi-three-dots"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a href="/edit-term/" class="dropdown-item">Edit</a>

                                                <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#deleteData" onclick="_trashModal(39,'categoryTrash');">
                                                    Delete
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php } } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
<div class="modal fade" id="basicModal" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Update Status: </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="amr-option-group">
                <form class="amr-radiomenu" >
                  <div class="amr-option-holder">
                    <input id="amr-option1" type="radio" name="radio">
                    <label class="amr-label" for="amr-option1" >
                      <span class="amr-checkmark">
                        <i class="bi bi-check2"></i>
                      </span>
                      Published
                    </label>
                  </div>
                  <div class="amr-option-holder">
                    <input id="amr-option2" type="radio" name="radio">
                    <label class="amr-label" for="amr-option2" >
                      <span class="amr-checkmark">
                        <i class="bi bi-check2"></i>
                      </span>
                      Unpublished
                    </label>
                  </div>
                  <div class="amr-option-holder">
                    <input id="amr-option3" type="radio" name="radio">
                    <label class="amr-label" for="amr-option3" >
                      <span class="amr-checkmark">
                        <i class="bi bi-check2"></i>
                      </span>
                      Trashed
                    </label>
                  </div>
                </form>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
</div>
