@extends ('dashboard.master')

@section('content')
    <div class="col-sm-12 dashboard-home">
        <div class="dashboard-home-container">
            <h2>Assets</h2>

            <form id="form-assets" method="POST" action="{{ route('dashboard_store_assets') }}" enctype="multipart/form-data">

                @include ('layouts.errors')
                @include ('layouts.message')
                {{ csrf_field() }}

                <div class="card form-panel">
                    <div class="card-header">
                        <i class="fa fa-table"></i> Header Content
                    </div>
                    
                    <div class="form-wrapper" >
                        <div id="fileuploader">Upload</div>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection