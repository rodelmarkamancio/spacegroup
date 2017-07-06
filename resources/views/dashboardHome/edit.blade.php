@extends ('dashboard.master')

@section('content')
    <div class="col-sm-12 dashboard-home">
        <div class="dashboard-home-container">
            <h2>Edit Homepage</h2>
            
            <form method="POST" action="{{ route('update_dashboard_home', $dHome[0]->id) }}" enctype="multipart/form-data">

                @include ('layouts.errors')
                @include ('layouts.message')
                {{ csrf_field() }}

                <div class="card form-panel">
                    <div class="card-header">
                        <i class="fa fa-table"></i> Header Content
                    </div>
                    
                    <div class="form-wrapper">
                        <div class="form-group">
                            <label>
                                <input type="text" placeholder="Header Text 1" name="head_text_1" value="{{ $dHome[0]->head_text_1 }}" required autocomplete="off" class="form-control">
                                <span>Header Text 1</span>
                            </label>
                        </div>
                        <div class="form-group">
                            <label>
                                <input type="text" placeholder="Header Text 2" name="head_text_2" value="{{ $dHome[0]->head_text_2 }}" required autocomplete="off" class="form-control">
                                <span>Header Text 2</span>
                            </label>
                        </div>
                        <div class="form-group">
                            <label>
                                <input type="text" placeholder="Header Text 3" name="head_text_3" value="{{ $dHome[0]->head_text_3 }}" required autocomplete="off" class="form-control">
                                <span>Header Text 3</span>
                            </label>
                        </div>
                        <div class="form-group">
                            <label>
                                <input type="text" placeholder="Header Introduction" name="head_intro" value="{{ $dHome[0]->head_intro }}" required autocomplete="off" class="form-control">
                                <span>Header Introduction</span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="card form-panel">
                    <div class="card-header">
                        <i class="fa fa-table"></i> Middle Content
                    </div>
                    
                    <div class="form-wrapper">
                        <div class="card-header form-header">
                            <i class="fa fa-table"></i> Panel 1
                        </div>

                        <div class="form-group">
                            <input type="file" name="mid_content_img_1" class="form-control">
                            <input type="hidden" name="mid_content_img_id_1" value="{{ $dHome[0]->mid_content_img_id_1 }}">
                        </div>
                        <div class="form-group">
                            <label>
                                <input type="text" placeholder="Content Text" name="mid_content_text_1" value="{{ $dHome[0]->mid_content_text_1 }}" required autocomplete="off" class="form-control">
                                <span>Content Text</span>
                            </label>
                        </div>
                        <div class="form-group">
                            <label>
                                <input type="text" placeholder="Content Description" name="mid_content_desc_1" value="{{ $dHome[0]->mid_content_desc_1 }}" required autocomplete="off" class="form-control">
                                <span>Content Description</span>
                            </label>
                        </div>
                    </div>

                    <div class="form-wrapper">
                        <div class="card-header form-header">
                            <i class="fa fa-table"></i> Panel 2
                        </div>

                        <div class="form-group">
                            <input type="file" name="mid_content_img_2" class="form-control">
                            <input type="hidden" name="mid_content_img_id_2" value="{{ $dHome[0]->mid_content_img_id_2 }}">
                        </div>
                        <div class="form-group">
                            <label>
                                <input type="text" placeholder="Content Text" name="mid_content_text_2" value="{{ $dHome[0]->mid_content_text_2 }}" required autocomplete="off" class="form-control">
                                <span>Content Text</span>
                            </label>
                        </div>
                        <div class="form-group">
                            <label>
                                <input type="text" placeholder="Content Description" name="mid_content_desc_2" value="{{ $dHome[0]->mid_content_desc_2 }}" required autocomplete="off" class="form-control">
                                <span>Content Description</span>
                            </label>
                        </div>
                    </div>

                    <div class="form-wrapper">
                        <div class="card-header form-header">
                            <i class="fa fa-table"></i> Panel 3
                        </div>

                        <div class="form-group">
                            <input type="file" name="mid_content_img_3" class="form-control">
                            <input type="hidden" name="mid_content_img_id_3" value="{{ $dHome[0]->mid_content_img_id_3 }}">
                        </div>
                        <div class="form-group">
                            <label>
                                <input type="text" placeholder="Content Text" name="mid_content_text_3" value="{{ $dHome[0]->mid_content_text_3 }}" required autocomplete="off" class="form-control">
                                <span>Content Text</span>
                            </label>
                        </div>
                        <div class="form-group">
                            <label>
                                <input type="text" placeholder="Content Description" name="mid_content_desc_3" value="{{ $dHome[0]->mid_content_desc_3 }}" required autocomplete="off" class="form-control">
                                <span>Content Description</span>
                            </label>
                        </div>
                    </div>

                    <div class="form-wrapper">
                        <div class="card-header form-header">
                            <i class="fa fa-table"></i> Panel Introduction
                        </div>

                        <div class="form-group">
                            <input type="file" name="mid_content_bg" class="form-control">
                            <input type="hidden" name="mid_content_bg_id" value="{{ $dHome[0]->mid_content_bg_id }}">
                        </div>
                        <div class="form-group">
                            <label>
                                <input type="text" placeholder="Content Introduction 1" name="mid_content_intro_1" value="{{ $dHome[0]->mid_content_intro_1 }}" required autocomplete="off" class="form-control">
                                <span>Content Introduction 1</span>
                            </label>
                        </div>
                        <div class="form-group">
                            <label>
                                <input type="text" placeholder="Content Introduction 2" name="mid_content_intro_2" value="{{ $dHome[0]->mid_content_intro_2 }}" required autocomplete="off" class="form-control">
                                <span>Content Introduction 2</span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-wrapper">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <button type="reset" class="btn btn-secondary">Cancel</button>
                </div>

            </form>
        </div>
    </div>
@endsection