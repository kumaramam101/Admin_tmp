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
            <div class="card-body overflow-auto">
                <table class="table" id="example">
                  <thead>
                    <tr>
                        <th>
                            <input class="form-check-input select-all" type="checkbox" data-select-all-target="#example" id="defaultCheck1">
                        </th>
                        <th>S.N.</th>
                        <th>User Role</th>
                        <th>User Name</th>
                        <th>Full Name</th>
                        <th>Parent User</th>
                        <th>Created On</th>
                        <th>Updated On</th>
                        <th class="text-end">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                        <td>
                            <input class="form-check-input multiDeleteCheckBox"  name="multiDeleteCheckBox" value="26" type="checkbox">
                        </td>
                        <td>
                            <a href="#">1</a>
                        </td>
                        <td>Seo</td>
                        <td>manju@myitronline.com</td>
                        <td>Manju  Verma</td>
                        <td>Super Administrator</td>
                        <td>29-Mar-2023 </td>
                        <td>
                            <span class="badge bg-info">Not yet Updated</span>
                        </td>
                        <td class="text-end">
                            <div class="dropdown">
                                <a href="#" data-bs-toggle="dropdown" class="btn btn-floating"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="bi bi-three-dots"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="/editUser/26" class="dropdown-item">Edit
                                        Users</a>

                                    <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#deleteData" onclick="_trashModal(26,'userTrash');">
                                        Delete
                                    </button>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input class="form-check-input multiDeleteCheckBox"  name="multiDeleteCheckBox" value="26" type="checkbox">
                        </td>
                        <td>
                            <a href="#">2</a>
                        </td>
                        <td>Seo</td>
                        <td>manju@myitronline.com</td>
                        <td>Manju  Verma</td>
                        <td>Super Administrator</td>
                        <td>29-Mar-2023 </td>
                        <td>
                            <span class="badge bg-info">Not yet Updated</span>
                        </td>
                        <td class="text-end">
                            <div class="dropdown">
                                <a href="#" data-bs-toggle="dropdown" class="btn btn-floating"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="bi bi-three-dots"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="/editUser/26" class="dropdown-item">Edit
                                        Users</a>

                                    <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#deleteData" onclick="_trashModal(26,'userTrash');">
                                        Delete
                                    </button>
                                </div>
                            </div>
                        </td>
                    </tr>
                  </tbody>
                </table>
            </div>
          </div>
        </div>
      </div>
    </section>
</main>
