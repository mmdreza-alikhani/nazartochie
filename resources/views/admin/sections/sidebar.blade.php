<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-item">
{{--                <a class="nav-link" href="{{ route('admin.index') }}"><i class="icon-speedometer"></i> داشبرد</a>--}}
            </li>

            <li class="nav-title">
                کاربران
            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#" style="{{ $activeParent == 'users' ? 'background-color:#20a8d8' : '' }}"><i class="icon-people"></i>مدیریت کاربران</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" style="{{ $activeChild == 'newUser' ? 'background-color:#e4e5e6;color:#263238' : '' }}" href="{{ route('admin.users.create') }}"><i class="icon-user-follow"></i>ثبت کاربر جدید</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="{{ $activeChild == 'allUsers' ? 'background-color:#e4e5e6;color:#263238' : '' }}" href="{{ route('admin.users.index') }}"><i class="icon-menu"></i>لیست کاربران</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="components-social-buttons.html"><i class="icon-direction"></i>دسترسی کاربران</a>
                    </li>
                </ul>
            </li>

            <li class="nav-title">
                دسته بندی ها
            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#" style="{{ $activeParent == 'categories' ? 'background-color:#20a8d8' : '' }}"><i class="icon-grid"></i>مدیریت دسته بندی ها</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" style="{{ $activeChild == 'newCategory' ? 'background-color:#e4e5e6;color:#263238' : '' }}" href="{{ route('admin.categories.create') }}"><i class="icon-plus"></i>دسته بندی جدید</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="{{ $activeChild == 'allCategories' ? 'background-color:#e4e5e6;color:#263238' : '' }}" href="{{ route('admin.categories.index') }}"><i class="icon-menu"></i>تمامی دسته بندی ها</a>
                    </li>
                </ul>
            </li>

            <li class="nav-title">
                برچسب ها
            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#" style="{{ $activeParent == 'tags' ? 'background-color:#20a8d8' : '' }}"><i class="icon-tag"></i>مدیریت برچسب ها</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" style="{{ $activeChild == 'newTag' ? 'background-color:#e4e5e6;color:#263238' : '' }}" href="{{ route('admin.tags.create') }}"><i class="icon-plus"></i>برچسب جدید</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="{{ $activeChild == 'allTags' ? 'background-color:#e4e5e6;color:#263238' : '' }}" href="{{ route('admin.tags.index') }}"><i class="icon-menu"></i>تمامی برچسب ها</a>
                    </li>
                </ul>
            </li>

            <li class="nav-title">
                مسائل
            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#" style="{{ $activeParent == 'issues' ? 'background-color:#20a8d8' : '' }}"><i class="icon-puzzle"></i>مدیریت مسائل</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" style="{{ $activeChild == 'allIssues' ? 'background-color:#e4e5e6;color:#263238' : '' }}" href="{{ route('admin.posts.index') }}"><i class="icon-menu"></i>تمامی مسائل</a>
                    </li>
                </ul>
            </li>

            <li class="nav-title">
                نظرات
            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-speech"></i>مدیریت نظرات</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="components-social-buttons.html"><i class="icon-menu"></i>تمامی نظرات</a>
                    </li>
                </ul>
            </li>

        </ul>
    </nav>
</div>
