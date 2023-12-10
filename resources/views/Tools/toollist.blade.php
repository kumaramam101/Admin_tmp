<main id="main" class="main">
    <div class="content ">
        <div class="card">
            <div class="card-header mb-3">
                <div class="row">
                    <div class="col-md-6 g-3">
                        <h4 class="card-title">Tax Tool & Calculators List</h4>
                    </div>
                    <div class="col-md-6 text-end">
                        <div class="dropdown ms-auto">
                            <a href="#" data-bs-toggle="dropdown" class="btn btn-primary dropdown-toggle"
                                aria-haspopup="true" aria-expanded="false">Actions</a>
                            <div class="dropdown-menu dropdown-menu-end" style="margin: 0px;">
                                <a href="{{ route('/add-tool') }}" class="dropdown-item"><i class="fa fa-plus"
                                        aria-hidden="true"></i>Add Tools</a>
                                <!-- <a href="javascript:void(0)" class="dropdown-item"><i class="fa fa-trash"
                                        aria-hidden="true"></i>Delete Category</a> -->
                                        <button type="button" class="dropdown-item" value="categoryMultiTrash" id="multipleDeleteTrash" onclick="_trashMultiModal(undefined,'categoryMultiTrash');"  >
                                <i class="fa fa-trash" aria-hidden="true"></i>Delete Tools</button>
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
                                <th>Title</th>
                                <th>Publisher</th>
                                <th>Status</th>
                                <th>Created On</th>
                                <th>Last Update</th>
                                <th>Updated By</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                //print_r($toolsdata);die;
                                $i = 1;
                                if(isset($toolsdata)){
                                    foreach ($toolsdata as $row) {
                                        $status = $row->toolStatus;
                                        if($status == 0){
                                            $status = "Trashed";
                                            $bgColor = "bg-danger";
                                        }elseif ($status == 1) {
                                            $status = "Published";
                                            $bgColor = "bg-success";
                                        }elseif ($status == 2) {
                                            $status = "Unpublished";
                                            $bgColor = "bg-warning";
                                        }else{
                                            $status = "Unpublished";
                                            $bgColor = "bg-warning";
                                        }
                            ?>
                            <tr>
                                <td>
                                    <input class="form-check-input multiDeleteCheckBox"  name="multiDeleteCheckBox" value="39"  type="checkbox">
                                </td>
                                <td>{{ $i++; }}</td>
                                <td>{{ $row->toolTitle }}</td>
                                <td>{{ $row->publishedBy }}</td>
                                <td><button class="badge <?php echo $bgColor; ?> border-0" data-bs-toggle="modal" data-bs-target="#basicModal1">{{ $status }}</button></td>
                                <td>{{ $row->createdOn }} </td>
                                <td>
                                    <?php if(isset($row->updatedOn)){ $lastUpdate = date('m/d/Y',$row->updatedOn); echo $lastUpdate; }else{ echo '<span class="badge bg-info">Not yet Updated</span>';} ?>
                                </td>
                                <td>{{ $row->updatedBy }}</td>
                                <td class="text-end">
                                    <div class="d-flex">
                                        <div class="dropdown ms-auto">
                                            <a href="#" data-bs-toggle="dropdown" class="btn btn-floating"
                                                aria-haspopup="true" aria-expanded="false">
                                                <i class="bi bi-three-dots"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a href="/admin_tmp/tool-edit/{{ Crypt::encryptString($row->uniqueId) }}" class="dropdown-item">Edit</a>
                                                {{-- <a href="{{ route('/tool/edit/') }}" class="dropdown-item">Edit</a> --}}
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
    {{-- <div class="container w-75">
        <div class="row mb-2">
            <div class="col-lg-6 mb-2"> <label for="fin_year_selt" class="col-form-label">Financial Year<span class="text-danger">*</span></label> <select class="form-control form-control-lg" id="fin_year_selt">
                    <option value="Select">Select</option>
                    <option value="22">2021-2022</option>
                    <option value="21">2020-2021</option>
                </select> </div>
            <div class="col-lg-6 mb-2"> <label for="pay_tax_selt" class="col-form-label">Regime/115BAC?<span class="text-danger">*</span></label> <select class="form-control form-control-lg" id="pay_tax_selt">
                    <option value="Select">Select</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select> </div>
        </div>
        <div class="card-header border-bottom">
            <h6 class="text-black">(A) For self, spouse & dependent children</h6>
        </div>
        <div class="card-body px-0">
            <div class="row">
                <div class="col-lg-8 mb-lg-2"> <label for="onRadio" class="col-form-label">Are any policy holders 60 years or above?</label> </div>
                <div class="col-lg-4 mb-4 pt-3">
                    <fieldset id="onRadio">
                        <div class="form-check form-check-inline"> <input type="radio" id="formInlineRadio1" class="form-check-input" value="Radio1_yes" checked name="handicapped"> <label class="form-check-label" for="formInlineRadio1">Yes</label> </div>
                        <div class="form-check form-check-inline"> <input type="radio" id="formInlineRadio2" class="form-check-input indeterminate-checkbox" name="handicapped" value="Radio1_no"> <label class="form-check-label" for="formInlineRadio2">No</label> </div>
                    </fieldset>
                </div>
                <div class="col-lg-8 mb-lg-2"> <label for="preven_chk_inp" class="col-form-label pt-3">Preventive health check-up <span class="text-danger">*</span></label> </div>
                <div class="col-lg-4 mb-2">
                    <div class="input-group mb-2"> <input type="number" class="form-control form-control-lg" name="preven_chk_inp" id="preven_chk_inp" placeholder="100"> <span class="input-group-text">Rs.</span> </div>
                </div>
                <div class="col-lg-8 mb-lg-2"> <label for="medi_amt_inp" class="col-form-label pt-3">Medical insurance premium amount <span class="text-danger">*</span></label> </div>
                <div class="col-lg-4 mb-2">
                    <div class="input-group mb-2"> <input type="number" class="form-control form-control-lg" name="medi_amt_inp" id="medi_amt_inp" placeholder="100"> <span class="input-group-text">Rs.</span> </div>
                </div>
            </div>
            <div class="row" id="medicshow1">
                <div class="col-lg-8 mb-lg-2"> <label for="medi_exp_inp" class="col-form-label pt-3">Medical expenditure amount <span class="text-danger">*</span></label> </div>
                <div class="col-lg-4 mb-2">
                    <div class="input-group mb-2"> <input type="number" class="form-control form-control-lg" name="medi_exp_inp" id="medi_exp_inp" placeholder="100"> <span class="input-group-text">Rs.</span> </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 mb-2">
                    <div class="bg-soft-secondary text-center rounded">
                        <div class="card-body">
                            <h2 class="h5 fw-normal mb-1"><i class="fa fa-inr"></i> <b id="total_dedu_lab">0</b></h2> <span class="small text-cap mb-0" id="result-text">Total deduction</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-header border-bottom mb-3">
                <h6 class="text-black">(B) For parents</h6>
            </div>
            <div class="row">
                <div class="col-lg-8 mb-lg-2"> <label for="onRadio1" class="col-form-label pt-3">Are any policy holders 60 years or above?</label> </div>
                <div class="col-lg-4 mb-4 pt-3">
                    <fieldset id="onRadio1">
                        <div class="form-check form-check-inline"> <input type="radio" id="formInlineRadio1" class="form-check-input" checked name="for_ parents" value="Radio2_yes"> <label class="form-check-label" for="formInlineRadio1">Yes</label> </div>
                        <div class="form-check form-check-inline"> <input type="radio" id="formInlineRadio2" class="form-check-input indeterminate-checkbox" name="for_ parents" value="Radio2_no"> <label class="form-check-label" for="formInlineRadio2">No</label> </div>
                    </fieldset>
                </div>
                <div class="col-lg-8 mb-lg-2"> <label for="pre_helt_inp" class="col-form-label pt-3">Preventive health check-up <span class="text-danger">*</span></label> </div>
                <div class="col-lg-4 mb-2">
                    <div class="input-group mb-2"> <input type="number" class="form-control form-control-lg" name="pre_helt_inp" id="pre_helt_inp" placeholder="100"> <span class="input-group-text">Rs.</span> </div>
                </div>
                <div class="col-lg-8 mb-lg-2"> <label for="medi_insamu_inp" class="col-form-label pt-3">Medical insurance premium amount <span class="text-danger">*</span></label> </div>
                <div class="col-lg-4 mb-2">
                    <div class="input-group mb-2"> <input type="number" class="form-control form-control-lg" name="medi_insamu_inp" id="medi_insamu_inp" placeholder="100"> <span class="input-group-text">Rs.</span> </div>
                </div>
            </div>
            <div class="row" id="medicshow2">
                <div class="col-lg-8 mb-lg-2"> <label for="medi_expamu_inp" class="col-form-label pt-3">Medical expenditure amount <span class="text-danger">*</span></label> </div>
                <div class="col-lg-4 mb-2">
                    <div class="input-group mb-2"> <input type="number" class="form-control form-control-lg" name="medi_expamu_inp" id="medi_expamu_inp" placeholder="100"> <span class="input-group-text">Rs.</span> </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 mb-2">
                    <div class="bg-soft-secondary text-center rounded">
                        <div class="card-body">
                            <h2 class="h5 fw-normal mb-1"><i class="fa fa-inr"></i> <b id="total_dedu_lab1">0</b></h2> <span class="small text-cap mb-0" id="result-text">Total deduction</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-3">
                    <div class="bg-soft-secondary text-center rounded">
                        <div class="card-body">
                            <h2 class="h5 fw-normal mb-1"><i class="fa fa-inr"></i> <b id="total_eligi_lab">0</b></h2> <span class="small text-cap mb-0" id="result-text">Total eligible deduction under 80D</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
</main>
<div class="modal fade" id="basicModal1" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Update Status: </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body px-4 bg-light">
            <label class="switch d-flex bg-white py-3 rounded m-0 px-2 border">
                <input type="radio" name="toggle" value="1">
                <div class="slider me-3"></div>
                <span>Published</span>
            </label>
            <label class="switch d-flex bg-white py-3 rounded m-0 px-2 border">
                <input type="radio" name="toggle" value="2">
                <div class="slider me-3"></div>
                <span>Unpublished</span>
            </label>
            <label class="switch d-flex bg-white py-3 rounded m-0 px-2 border">
                <input type="radio" name="toggle" value="0">
                <div class="slider me-3"></div>
                <span>Trashed</span>
            </label>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="toolStatusBtn">Save changes</button>
        </div>
      </div>
    </div>
</div>


