<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div id="articleModal" class="modal fade">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Message Preview</h5>
                    </div>
                    <div class="modal-body">
                        <form id="articleForm" enctype="multipart/form-data">
                            
                            {{ csrf_field() }}

                            <input type="hidden" name="_method" value="PUT" disabled>
                            <input type="hidden" name="id">
                            <input type="hidden" name="status">
                            
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" name="title" placeholder="Title">
                                <div class="invalid-feedback" id="title"></div>
                            </div>
                            <div class="form-group">
                                <label for="category">Category</label>
                                <input type="text" class="form-control" name="category" placeholder="Category">
                                <div class="invalid-feedback" id="category"></div>
                            </div>
                            <div class="form-group">
                                <label for="content">Content</label>
                                <textarea class="form-control" name="content" placeholder="Content" rows="10"></textarea>
                                <div class="invalid-feedback" id="content"></div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary btn-sm" id="btn-publish">
                            <span class="fa fa-pencil"> Publish</span> 
                        </button>
                        <button type="button" class="btn btn-success btn-sm" id="btn-draft">
                            <span class="fa fa-book text-white"> Draft</span> 
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>