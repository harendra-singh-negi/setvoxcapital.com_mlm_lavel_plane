<div
    class="modal fade"
    id="addNew"
    tabindex="-1"
    aria-labelledby="addNewHowItWorksModalLabel"
    aria-hidden="true"
>
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content site-table-modal">
            <div class="modal-body popup-body">
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>
                <div class="popup-body-text">
                    <h3 class="title mb-4">{{ __('Add New') }}</h3>
                    <form action="{{ route('admin.page.content-store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="type" value="whychooseus">

                        <div class="site-input-groups">
                            <label for="" class="box-input-label">{{ __('Icon Type:') }}</label>
                            <select class="form-select" id="iconType">
                                <option value="class" selected>{{ __('Icon Class') }}</option>
                                <option value="image">{{ __('Image') }}</option>
                            </select>
                        </div>
                        <div class="site-input-groups" id="classField">
                            <label for="" class="box-input-label">{{ __('Icon Class') }} <a class="link"
                                                                                            href="https://fontawesome.com/icons"
                                                                                            target="_blank">{{ __('Fontawesome') }}</a>:</label>
                            <input type="text" name="class_name" class="box-input mb-0" placeholder="Icon Class"/>
                        </div>

                        <div class="site-input-groups d-none" id="imageField">
                            <label class="box-input-label" for="">{{ __('Icon:') }}</label>
                            <div class="wrap-custom-file">
                                <input type="file" name="icon" id="icon" accept=".gif, .jpg, .png"/>
                                <label for="icon">
                                    <img class="upload-icon" src="{{ asset('global/materials/upload.svg') }}" alt=""/>
                                    <span>{{ __('Upload Icon') }}</span>
                                </label>
                            </div>
                        </div>

                        <div class="site-input-groups">
                            <label for="" class="box-input-label">{{ __('Title:') }}</label>
                            <input type="text" name="title" class="box-input mb-0" placeholder="Register" required=""/>
                        </div>
                        <div class="site-input-groups mb-0">
                            <label for="" class="box-input-label">{{ __('Description:') }}</label>
                            <textarea name="description" class="form-textarea" placeholder="Description"></textarea>
                        </div>

                        <div class="action-btns">
                            <button type="submit" class="site-btn-sm primary-btn me-2">
                                <i icon-name="check"></i>
                                {{ __('Add New') }}
                            </button>
                            <a
                                href="#"
                                class="site-btn-sm red-btn"
                                data-bs-dismiss="modal"
                                aria-label="Close"
                            >
                                <i icon-name="x"></i>
                                {{ __('Close') }}
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
