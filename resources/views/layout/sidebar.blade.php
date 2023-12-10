<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
       <li class="nav-item">
            <a class="nav-link " href="#">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <?php $role = Session::get('role');
            if($role == 1){
            echo '<li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#admin-nav" data-bs-toggle="collapse"
                href="#">
                <i class="bi bi-person-circle"></i><span>Admin</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="admin-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="'.route('/user').'">
                        <i class="bi bi-circle"></i><span>Users</span>
                    </a>
                </li>
                <li>
                    <a href="components-accordion.html">
                        <i class="bi bi-circle"></i><span>User Type</span>
                    </a>
                </li>
            </ul>
        </li>';
            }
        ?>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#project-nav" data-bs-toggle="collapse"
                href="#">
                <i class="bi bi-menu-button-wide"></i><span>Content</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="project-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('/terms') }}">
                        <i class="bi bi-circle"></i><span>Terms</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('/tools') }}">
                        <i class="bi bi-circle"></i><span>Tools</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('/tools') }}">
                <i class="bi-lightbulb-fill"></i>
                <span>Tools</span>
            </a>
        </li>
        <li class="nav-heading">Pages</li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('/profile') }}">
                <i class="bi bi-person"></i>
                <span>Profile</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-faq.html">
                <i class="bi bi-question-circle"></i>
                <span>F.A.Q</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('/contact') }}">
                <i class="bi bi-envelope"></i>
                <span>Contact</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('/error404') }}">
                <i class="bi bi-dash-circle"></i>
                <span>Error 404</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('/logout') }}">
                <i class="bi bi-box-arrow-right"></i>
                <span>Log Out</span>
            </a>
        </li>
    </ul>
</aside>
