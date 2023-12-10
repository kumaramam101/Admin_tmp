<main id="main" class="main">
    <div class="pagetitle">
      <h1>Data Tables</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active">Data</li>
        </ol>
      </nav>
    </div>
    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header mb-3">
                <div class="row">
                    <div class="col-6">
                        <h3 class="card-title m-0">User List</h3>
                    </div>
                    <div class="col-6 text-end">
                        <div class="dropdown ms-auto mt-2">
                            <a href="#" data-bs-toggle="dropdown" class="btn btn-primary dropdown-toggle" aria-haspopup="true" aria-expanded="false">Actions</a>
                            <div class="dropdown-menu dropdown-menu-end" style="margin: 0px;">
                                <a href="{{ route('/addUser') }}" class="dropdown-item"><i class="fa fa-plus" aria-hidden="true"></i>Add New User</a>
                                <button type="button" class="dropdown-item" value="userMultiTrash" id="multipleDeleteTrash" onclick="_trashMultiModal(undefined,'userMultiTrash');">
                                    <i class="fa fa-trash" aria-hidden="true"></i>Delete User</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body overflow-auto py-3">
                <table class="table" id="example">
                  <thead>
                    <tr>
                        <th>
                            <input class="form-check-input select-all" type="checkbox" data-select-all-target="#example" id="defaultCheck1">
                        </th>
                        <th>S.N.</th>
                        <th>User Type</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contact</th>
                        <th>Status</th>
                        <th>Last Update</th>
                        <th class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                        //print_r($userlist);
                        $i = 1;
                        if(isset($userlist)){
                            foreach ($userlist as $row) {
                            $fullname = $row->first_name ." ".$row->last_name;
                            $isActive = $row->isTrashed;
                            $role = $row->user_type;
                    ?>
                    <tr>
                        <td>
                            <input class="form-check-input multiDeleteCheckBox"  name="multiDeleteCheckBox" value="26" type="checkbox">
                        </td>
                        <td>
                            <a href="#">{{ $i++ }}</a>
                        </td>
                        <td><?php if($role == 1){ echo "Super Admin"; }else{ echo "Sub Admin"; } ?></td>
                        <td>{{ $fullname }}</td>
                        <td>{{ $row->email }}</td>
                        <td>{{ $row->phone }}</td>
                        <?php
                        if($isActive == 0){
                            echo '<td><span class="badge bg-success">Active</span></td>';
                        }else{
                            echo '<td><span class="badge bg-danger">Inactive</span></td>';
                        }
                        ?>
                        <td>
                            <span class="badge bg-info">Not yet Updated</span>
                        </td>
                        <td class="text-center">
                            <div class="dropdown">
                                <a href="#" data-bs-toggle="dropdown" class="btn btn-floating"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="bi bi-three-dots"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="/editUser/{{ Hash::make($row->uniquId); }}" class="dropdown-item">Edit Users</a>
                                    <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#deleteData" onclick="_trashModal(26,'userTrash');">
                                        Delete
                                    </button>
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
    </section>
</main>
