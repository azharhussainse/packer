{{ html()->modelForm($logged_in_user, 'POST', route('frontend.user.profile.update'))->class('form-horizontal')->attribute('enctype', 'multipart/form-data')->open() }}
    @method('PATCH')
    <div class="row">
        <div class="col">
            <div class="form-group">
                {{ html()->label(__('validation.attributes.frontend.avatar'))->for('avatar') }}

                <div class="d-none">
                    <input type="radio" name="avatar_type" value="storage" checked/> Upload
                </div>
            </div><!--form-group-->

            <div class="form-group" id="avatar_location">
                {{ html()->file('avatar_location')->class('form-control-file') }}
            </div><!--form-group-->
        </div><!--col-->
    </div><!--row-->

    <div class="row">
        <div class="col">
            <div class="form-group">
                {{ html()->label(__('Full Name'))->for('first_name') }}

                {{ html()->text('first_name')
                    ->class('form-control')
                    ->placeholder(__('validation.attributes.frontend.first_name'))
                    ->attribute('maxlength', 191)
                    ->required()
                    ->autofocus() }}
            </div><!--form-group-->
        </div><!--col-->
    </div><!--row-->

    {{-- <div class="row">
        <div class="col">
            <div class="form-group">
                {{ html()->label(__('validation.attributes.frontend.last_name'))->for('last_name') }}

                {{ html()->text('last_name')
                    ->class('form-control')
                    ->placeholder(__('validation.attributes.frontend.last_name'))
                    ->attribute('maxlength', 191)
                     }}
            </div><!--form-group-->
        </div><!--col-->
    </div><!--row--> --}}


    @if ($logged_in_user->canChangeEmail())
        <div class="row">
            <div class="col">
                <div class="alert alert-info">
                    <i class="fas fa-info-circle"></i> @lang('strings.frontend.user.change_email_notice')
                </div>

                <div class="form-group">
                    {{ html()->label(__('validation.attributes.frontend.email'))->for('email') }}

                    {{ html()->email('email')
                        ->class('form-control')
                        ->placeholder(__('validation.attributes.frontend.email'))
                        ->attribute('maxlength', 191)
                        ->required() }}
                </div><!--form-group-->
            </div><!--col-->
        </div><!--row-->
    @endif
    <div class="row">
        <div class="col">
            <div class="form-group">
                {{ html()->label('Date of Birth')->for('dob') }}

                {{ html()->date('dob')
                    ->class('form-control')
                    ->placeholder('Date of Birth')
                }}
            </div><!--form-group-->
        </div><!--col-->
    </div><!--row-->
    <div class="row">
        <div class="col">
            
            <div class="form-group">
                {{ Form::label('country', 'Country', ['class' => 'from-control-label required']) }}
                {{ Form::select('country', $countries, $logged_in_user->country,['class' => 'form-control', 'placeholder' => 'Country']) }}

            </div><!--form-group-->
        </div><!--col-->
    </div><!--row-->
    <div class="row">
        <div class="col">
            <div class="form-group">
                {{ html()->label('CNIC #')->for('cnic') }}

                {{ html()->text('cnic')
                    ->class('form-control')
                    ->placeholder('CNIC #')
                }}
            </div><!--form-group-->
        </div><!--col-->
    </div><!--row-->
    <div class="row">
        <div class="col">
            <div class="form-group">
                {{ html()->label('Passport')->for('passport') }}

                {{ html()->text('passport')
                    ->class('form-control')
                    ->placeholder('Passport')
                }}
            </div><!--form-group-->
        </div><!--col-->
    </div><!--row-->
    <div class="row">
        <div class="col">
            <div class="form-group">
                {{ html()->label('Phone')->for('phone') }}

                {{ html()->text('phone')
                    ->class('form-control')
                    ->placeholder('Phone')
                }}
            </div><!--form-group-->
        </div><!--col-->
    </div><!--row-->
    <div class="row">
        <div class="col">
            <div class="form-group">
                {{ html()->label('Bio')->for('bio') }}

                {{ html()->textarea('bio')
                    ->class('form-control')
                    ->placeholder('Bio')
                }}
            </div><!--form-group-->
        </div><!--col-->
    </div><!--row-->

    <div class="row">
        <div class="col">
            <div class="form-group mb-0 clearfix">
                {{ form_submit(__('labels.general.buttons.update'),'btn-1 shadow1 style3 bgscheme') }}
            </div><!--form-group-->
        </div><!--col-->
    </div><!--row-->
{{ html()->closeModelForm() }}

<div class="modal fade" id="setAvatarModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Edit Media</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="img-container">
                  <div class="row">
                      <div class="col-md-10">
                          <img src="" id="sample_image" />
                      </div>
                      <!-- <div class="col-md-4">
                          <div class="preview"></div>
                      </div> -->
                  </div>
              </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="crop" class="btn btn-primary">Crop</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
      </div>
    </div>
</div>

<div class="modal fade" id="setBannerModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Edit Media</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="img-container">
                  <div class="row">
                      <div class="col-md-10">
                          <img src="" id="sample_banner" />
                      </div>
                      <div class="col-md-4">
                          <div class="preview-banner"></div>
                      </div>
                  </div>
              </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="crop2" class="btn btn-primary">Crop</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
      </div>
    </div>
</div>

@push('after-scripts')
    <script>
        $(function() {


            var avatar_location = $("#avatar_location");

            if ($('input[name=avatar_type]:checked').val() === 'storage') {
                avatar_location.show();
            } else {
                avatar_location.hide();
            }

            $('input[name=avatar_type]').change(function() {
                if ($(this).val() === 'storage') {
                    avatar_location.show();
                } else {
                    avatar_location.hide();
                }
            });

        });
    </script>
@endpush
