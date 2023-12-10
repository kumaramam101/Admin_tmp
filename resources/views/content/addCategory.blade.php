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
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6">
                                <h3 class="card-title m-0">ADD Category & EDIT Category</h3>
                            </div>
                            <div class="col-md-6 text-end my-auto">
                                <button class="btn btn-success px-4 py-2 add_user">Save</button>
                                <a href="{{ route('/user') }}" class="btn btn-danger px-4 py-2">Close</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-tabs nav-tabs-bordered mb-3 mt-2" id="borderedTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="content-tab" data-bs-toggle="tab"
                                    data-bs-target="#bordered-content" type="button" role="tab" aria-controls="contemt"
                                    aria-selected="true">Content</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="media-tab" data-bs-toggle="tab"
                                    data-bs-target="#bordered-media" type="button" role="tab"
                                    aria-controls="media" aria-selected="false">Media Sources</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="meta-tab" data-bs-toggle="tab"
                                    data-bs-target="#bordered-meta" type="button" role="tab"
                                    aria-controls="meta" aria-selected="false">Meta Type</button>
                            </li>
                        </ul>
                        <div class="tab-content pt-2" id="borderedTabContent">
                            <div class="tab-pane fade show active" id="bordered-content" role="tabpanel" aria-labelledby="content-tab">
                                <div class="card border shadow-none">
                                    <div class="card-body pt-3">
                                        <form class="row g-3" id="user_form_data">
                                            <div class="col-md-4">
                                                <label for="user_type" class="form-label">Type Of User</label>
                                                <select id="user_type" class="form-select">
                                                    <option value="">Choose an option</option>
                                                    <option value="2">Super Admin</option>
                                                    <option value="1">Sub Admin</option>
                                                </select>
                                                <div class="invalid-feedback" id="user_type_err"></div>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="user_type" class="form-label">Type Of User</label>
                                                <select id="user_type" class="form-select">
                                                    <option value="">Choose an option</option>
                                                    <option value="2">Super Admin</option>
                                                    <option value="1">Sub Admin</option>
                                                </select>
                                                <div class="invalid-feedback" id="user_type_err"></div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="fname" class="form-label">First Name</label>
                                                <input type="text" class="form-control" placeholder="rohan" id="fname">
                                                <div class="invalid-feedback" id="fname_err"></div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="lname" class="form-label">Last Name</label>
                                                <input type="text" class="form-control" placeholder="mishra" id="lname">
                                                <div class="invalid-feedback" id="lname_err"></div>
                                            </div>
                                            <div class="col-sm-9">
                                                <label for="inputPassword" class="col-sm-2 col-form-label">Textarea</label>
                                                <textarea class="form-control" style="height: 100px"></textarea>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="user_type" class="form-label">Type Of User</label>
                                                <select id="user_type" class="form-select">
                                                    <option value="">Choose an option</option>
                                                    <option value="2">Super Admin</option>
                                                    <option value="1">Sub Admin</option>
                                                </select>
                                                <div class="invalid-feedback" id="user_type_err"></div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="bordered-media" role="tabpanel"
                                aria-labelledby="media-tab">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="card border shadow-none">
                                            <div class="card-header">Intro Image</div>
                                            <div class="card-body">
                                                <div class="col-sm-12 mb-3">
                                                    <label for="inputNumber" class="col-sm-2 col-form-label">File Upload</label>
                                                    <input class="form-control" type="file" id="formFile">
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <label for="fname" class="form-label">First Name</label>
                                                    <input type="text" class="form-control" placeholder="rohan" id="fname">
                                                    <div class="invalid-feedback" id="fname_err"></div>
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <label for="fname" class="form-label">First Name</label>
                                                    <input type="text" class="form-control" placeholder="rohan" id="fname">
                                                    <div class="invalid-feedback" id="fname_err"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="card border shadow-none">
                                            <div class="card-header">Full Article Image</div>
                                            <div class="card-body">
                                                <div class="col-sm-12 mb-3">
                                                    <label for="inputNumber" class="col-sm-2 col-form-label">File Upload</label>
                                                    <input class="form-control" type="file" id="formFile">
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <label for="fname" class="form-label">First Name</label>
                                                    <input type="text" class="form-control" placeholder="rohan" id="fname">
                                                    <div class="invalid-feedback" id="fname_err"></div>
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <label for="fname" class="form-label">First Name</label>
                                                    <input type="text" class="form-control" placeholder="rohan" id="fname">
                                                    <div class="invalid-feedback" id="fname_err"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="bordered-meta" role="tabpanel"
                                aria-labelledby="meta-tab">
                                Saepe animi et soluta ad odit soluta sunt. Nihil quos omnis animi debitis cumque.
                                Accusantium quibusdam perspiciatis qui qui omnis magnam. Officiis accusamus impedit
                                molestias nostrum veniam. Qui amet ipsum iure. Dignissimos fuga tempore dolor.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
