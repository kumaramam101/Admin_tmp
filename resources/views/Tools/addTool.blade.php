<main id="main" class="main">
    <?php
       // print_r($toolData);die;
       if(isset($toolData)){
            $tool = $toolData;
            if (isset($tool->uniqueId)) {
                $Id = $tool->uniqueId;
            }else{ $Id = "0"; }
            if (isset($tool->toolTitle)) {
                $Title = $tool->toolTitle;
            }else{ $Title = ""; }
            if (isset($tool->toolAlias)) {
                $Alias = $tool->toolAlias;
            }else{ $Alias = ""; }
            if (isset($tool->toolHeading)) {
                $Heading = $tool->toolHeading;
            }else{ $Heading = ""; }
            if (isset($tool->toolSynopsis)) {
                $Synopsis = $tool->toolSynopsis;
            }else{ $Synopsis = ""; }
            if (isset($tool->breadcrumb)) {
                $Breadcrumb = $tool->breadcrumb;
            }else{ $Breadcrumb = ""; }
            if (isset($tool->tool_HTML)) {
                $HTML = $tool->tool_HTML;
            }else{ $HTML = ""; }
            if (isset($tool->tool_JS_cdn)) {
                $JS = $tool->tool_JS_cdn;
            }else{ $JS = ""; }
            if (isset($tool->tool_CSS_cdn)) {
                $CSS = $tool->tool_CSS_cdn;
            }else{ $CSS = ""; }
            if (isset($tool->toolStatus)) {
                $Status = $tool->toolStatus;
            }else{ $Status = ""; }
       }
    ?>
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
                                <h3 class="card-title m-0">Add New Tools & Calculators</h3>
                            </div>
                            <div class="col-md-6 text-end my-auto">
                                <button class="btn btn-success px-4 py-2" id="add_tool">Save</button>
                                <a href="{{ route('/tools') }}" class="btn btn-danger px-4 py-2">Close</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-tabs nav-tabs-bordered mb-3 mt-2" id="borderedTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="content-tab" data-bs-toggle="tab"
                                    data-bs-target="#tool-content" type="button" role="tab" aria-controls="contemt"
                                    aria-selected="true">Tool Details</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="media-tab" data-bs-toggle="tab"
                                    data-bs-target="#tool-code" type="button" role="tab"
                                    aria-controls="media" aria-selected="false">HTML CSS & JS</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="meta-tab" data-bs-toggle="tab"
                                    data-bs-target="#tool-meta" type="button" role="tab"
                                    aria-controls="meta" aria-selected="false">Meta Type</button>
                            </li>
                        </ul>
                        <div class="tab-content pt-2" id="borderedTabContent">
                            <div class="tab-pane fade show active" id="tool-content" role="tabpanel" aria-labelledby="content-tab">
                                <div class="card border shadow-none mb-0 pb-2">
                                    <div class="card-body pt-3">
                                        <form class="row g-3" id="user_form_data">
                                            <input type="hidden" id="hidden_id" name="hidden_id"
                                                value="{{ $Id }}">
                                            <div class="col-md-4">
                                                <label for="user_type" class="form-label">Category Of tool</label>
                                                <select id="user_type" class="form-select">
                                                    <option value="">Choose an option</option>
                                                    <option value="2">Super Admin</option>
                                                    <option value="1">Sub Admin</option>
                                                </select>
                                                <div class="invalid-feedback" id="user_type_err"></div>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="col_view" class="form-label">Summary View Col-md</label>
                                                <select id="col_view" class="form-select">
                                                    <option value="col-sm">Col-sm</option>
                                                    <option value="col-md">Col-md</option>
                                                    <option value="col-lg">Col-lg</option>
                                                </select>
                                                <div class="invalid-feedback" id="col_view_err"></div>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="tool_status" class="form-label">Status</label>
                                                    <select id="tool_status" class="form-select">
                                                    <option value="2" <?php echo ($Status == 2) ? 'selected' : ''; ?>>Unpublished</option>
                                                    <option value="1" <?php echo ($Status == 1) ? 'selected' : ''; ?>>Published</option>
                                                    <option value="0" <?php echo ($Status == 0) ? 'selected' : ''; ?>>Trashed</option>
                                                </select>
                                                <div class="invalid-feedback" id="tool_status_err"></div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="toolTitle" class="form-label">Tool Title</label>
                                                <input type="text" class="form-control aliasObj" placeholder="rohan" id="toolTitle" value="{{ $Title }}">
                                                <div class="invalid-feedback" id="toolTitle_err"></div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="toolAlias" class="form-label">Tool Alias</label>
                                                <input type="text" class="form-control aliasSub" disabled placeholder="mishra" id="toolAlias" value="{{ $Alias }}">
                                                <div class="invalid-feedback" id="toolAlias_err"></div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="toolHeading" class="form-label">Tool Heading</label>
                                                <input type="text" class="form-control" placeholder="mishra" id="toolHeading" value="{{ $Heading }}">
                                                <div class="invalid-feedback" id="toolHeading_err"></div>
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="toolSynopsis" class="col-form-label">Tools Synopsis</label>
                                                <textarea class="form-control" id="toolSynopsis">{{ $Synopsis }}</textarea>
                                                <div class="invalid-feedback" id="toolSynopsis_err"></div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tool-code" role="tabpanel" aria-labelledby="media-tab">
                                <div class="card border shadow-none mb-0 pb-2">
                                    <div class="card-body pt-3">
                                        <div class="row g-3">
                                            <div class="col-md-4">
                                                <label for="user_type" class="form-label">Category Of tool</label>
                                                <select id="user_type" class="form-select">
                                                    <option value="">Choose an option</option>
                                                    <option value="2">Super Admin</option>
                                                    <option value="1">Sub Admin</option>
                                                </select>
                                                <div class="invalid-feedback" id="user_type_err"></div>
                                            </div>
                                            <div class="col-sm-9">
                                                <label for="tool_html" class="col-form-label">HTML Code</label>
                                                <textarea class="form-control" id="tool_html"></textarea>
                                            </div>
                                            <div class="col-sm-3">
                                                <label for="" class="col-form-label">Active Code</label>
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" id="html_status">
                                                    <label class="form-check-label" for="html_status">Inactive</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-9">
                                                <label for="tool_css" class="col-form-label">CSS Code</label>
                                                <textarea class="form-control" id="tool_css"></textarea>
                                            </div>
                                            <div class="col-sm-3">
                                                <label for="" class="col-form-label">Active Code</label>
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" id="css_status">
                                                    <label class="form-check-label" for="css_status">Inactive</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-9">
                                                <label for="tool_js" class="col-form-label">JS Code</label>
                                                <textarea class="form-control" id="tool_js"></textarea>
                                            </div>
                                            <div class="col-sm-3">
                                                <label for="" class="col-form-label">Active Code</label>
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" id="js_status">
                                                    <label class="form-check-label" for="js_status">Inactive</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tool-meta" role="tabpanel"
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

