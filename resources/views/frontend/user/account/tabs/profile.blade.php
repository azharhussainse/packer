<div class="table-responsive">
    <table class="table table-striped table-hover table-bordered">
        <tr>
            <th>@lang('labels.frontend.user.profile.avatar')</th>
            <td><img src="{{ $logged_in_user->picture }}" class="rounded-circle avatar user-profile-image" style="width:200px;height:200px;" /></td>
        </tr>
        <tr>
            <th>@lang('labels.frontend.user.profile.name')</th>
            <td>{{ $logged_in_user->name }}</td>
        </tr>
        <tr>
            <th>@lang('labels.frontend.user.profile.email')</th>
            <td>{{ $logged_in_user->email }}</td>
        </tr>
        <tr>
            <th>Date of Birth</th>
            <td>{{ ($logged_in_user->dob == "") ? "" : date("m/d/Y",strtotime($logged_in_user->dob)) }}</td>
        </tr>
        <tr>
            <th>Country</th>
            <td>{{ getCountry($logged_in_user->country) }}</td>
        </tr>
        <tr>
            <th>CNIC #</th>
            <td>{{ $logged_in_user->cnic }}</td>
        </tr>
        <tr>
            <th>Passport</th>
            <td>{{ $logged_in_user->passport }}</td>
        </tr>
        <tr>
            <th>Phone</th>
            <td>{{ $logged_in_user->phone }}</td>
        </tr>
        <tr>
            <th>Bio</th>
            <td>{{ $logged_in_user->bio }}</td>
        </tr>
        <tr>
            <th>@lang('labels.frontend.user.profile.created_at')</th>
            <td>{{ timezone()->convertToLocal($logged_in_user->created_at) }} ({{ $logged_in_user->created_at->diffForHumans() }})</td>
        </tr>
        <tr>
            <th>@lang('labels.frontend.user.profile.last_updated')</th>
            <td>{{ timezone()->convertToLocal($logged_in_user->updated_at) }} ({{ $logged_in_user->updated_at->diffForHumans() }})</td>
        </tr>
    </table>
</div>
