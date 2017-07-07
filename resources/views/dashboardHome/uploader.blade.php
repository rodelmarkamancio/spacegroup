<div class="container uploader-wrapper">
    <div class="uploader-row">
        <div class="row">
            <div class="col-md-12">
                <div class="content-header">
                    <h3><i class="fa fa-cloud-upload"></i>Upload Content</h3>
                    <button class="btn btn-close"><i class="fa fa-close"></i></button>
                </div>
                <div class="content-uploader">
                    <div class="content-alert-wrapper">
                        <div class="alert alert-success content-alert" role="alert"></div>
                    </div>
                    <div class="content-uploader-grid content-uploader-list">
                        @foreach ($assets as $asset)
                            <div class="content-upload-wrapper">
                                <div class="content-uploader-img">
                                    <div class="figure img-effect">
                                        <img id="image-display-{{ $asset->id }}" data-id="{{ $asset->id }}" src="{{ route('storage', $asset->filename) }}" class="image-display" />
                                        <div class="figcaption">
                                            <p class="icon-links">
                                                <a href="#" class="btn-uploader-select" data-id="{{ $asset->id }}" title="Select Image"><i class="fa fa-check"></i></a>
                                                <a href="#" class="btn-uploader-download" data-id="{{ $asset->id }}" title="Download Image"><i class="fa fa-download"></i></a>
                                                <a href="#" class="btn-uploader-delete" data-id="{{ $asset->id }}" title="Delete Image"><i class="fa fa-close"></i></a>
                                            </p>
                                        </div>			
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>