<aside class="main-sidebar">
    <section class="sidebar" style="height: auto;">
        <ul class="sidebar-menu tree" data-widget="tree">
            <li>
                <a href="{{ route("admin.home") }}">
                    <i class="fas fa-fw fa-tachometer-alt">

                    </i>
                    {{ trans('global.dashboard') }}
                </a>
            </li>
            @can('user_management_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-users">

                        </i>
                        <span>{{ trans('cruds.userManagement.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('permission_access')
                            <li class="{{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "active" : "" }}">
                                <a href="{{ route("admin.permissions.index") }}">
                                    <i class="fa-fw fas fa-unlock-alt">

                                    </i>
                                    <span>{{ trans('cruds.permission.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('role_access')
                            <li class="{{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "active" : "" }}">
                                <a href="{{ route("admin.roles.index") }}">
                                    <i class="fa-fw fas fa-briefcase">

                                    </i>
                                    <span>{{ trans('cruds.role.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('user_access')
                            <li class="{{ request()->is("admin/users") || request()->is("admin/users/*") ? "active" : "" }}">
                                <a href="{{ route("admin.users.index") }}">
                                    <i class="fa-fw fas fa-user">

                                    </i>
                                    <span>{{ trans('cruds.user.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('applicant_in_formation_access')
                <li class="{{ request()->is("admin/applicant-in-formations") || request()->is("admin/applicant-in-formations/*") ? "active" : "" }}">
                    <a href="{{ route("admin.applicant-in-formations.index") }}">
                        <i class="fa-fw fas fa-address-card">

                        </i>
                        <span>{{ trans('cruds.applicantInFormation.title') }}</span>

                    </a>
                </li>
            @endcan
            @can('company_detail_access')
                <li class="{{ request()->is("admin/company-details") || request()->is("admin/company-details/*") ? "active" : "" }}">
                    <a href="{{ route("admin.company-details.index") }}">
                        <i class="fa-fw far fa-address-card">

                        </i>
                        <span>{{ trans('cruds.companyDetail.title') }}</span>

                    </a>
                </li>
            @endcan
            @can('export_detail_access')
                <li class="{{ request()->is("admin/export-details") || request()->is("admin/export-details/*") ? "active" : "" }}">
                    <a href="{{ route("admin.export-details.index") }}">
                        <i class="fa-fw fas fa-ambulance">

                        </i>
                        <span>{{ trans('cruds.exportDetail.title') }}</span>

                    </a>
                </li>
            @endcan
            @can('compliance_information_access')
                <li class="{{ request()->is("admin/compliance-informations") || request()->is("admin/compliance-informations/*") ? "active" : "" }}">
                    <a href="{{ route("admin.compliance-informations.index") }}">
                        <i class="fa-fw fas fa-cogs">

                        </i>
                        <span>{{ trans('cruds.complianceInformation.title') }}</span>

                    </a>
                </li>
            @endcan
            @can('submission_checklist_access')
                <li class="{{ request()->is("admin/submission-checklists") || request()->is("admin/submission-checklists/*") ? "active" : "" }}">
                    <a href="{{ route("admin.submission-checklists.index") }}">
                        <i class="fa-fw fas fa-book">

                        </i>
                        <span>{{ trans('cruds.submissionChecklist.title') }}</span>

                    </a>
                </li>
            @endcan
            @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                @can('profile_password_edit')
                    <li class="{{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}">
                        <a href="{{ route('profile.password.edit') }}">
                            <i class="fa-fw fas fa-key">
                            </i>
                            {{ trans('global.change_password') }}
                        </a>
                    </li>
                @endcan
            @endif
            <li>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="fas fa-fw fa-sign-out-alt">

                    </i>
                    {{ trans('global.logout') }}
                </a>
            </li>
        </ul>
    </section>
</aside>