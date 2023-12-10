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
                                <h3 class="card-title m-0">ADD Term & EDIT Term</h3>
                            </div>
                            <div class="col-md-6 text-end my-auto">
                                <button class="btn btn-success px-4 py-2" id="add_term">Save</button>
                                <a href="{{ route('/user') }}" class="btn btn-danger px-4 py-2">Close</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-3">
                        <h5>Term Details</h5>
                        <div class="card border shadow-none">
                            <div class="card-body pt-3">
                                <div class="row g-3">
                                    <div class="col-md-4">
                                        <label for="termName" class="form-label">Term Name</label>
                                        <input type="text" class="form-control aliasObj" placeholder="Example Term" id="termName">
                                        <div class="invalid-feedback" id="termName_err"></div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="termAlias" class="form-label">Term Alias</label>
                                        <input type="text" class="form-control aliasSub" disabled placeholder="example-term" id="termAlias">
                                        <div class="invalid-feedback" id="termAlias_err"></div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="termStatus" class="form-label">Status</label>
                                        <select id="termStatus" class="form-select">
                                            <option value="2">Unpublished</option>
                                            <option value="1">Published</option>
                                            <option value="3">Archived</option>
                                            <option value="0">Trashed</option>
                                        </select>
                                        <div class="invalid-feedback" id="termStatus_err"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
