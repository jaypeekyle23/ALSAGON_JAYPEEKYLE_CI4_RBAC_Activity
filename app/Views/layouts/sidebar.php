<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="<?= base_url(); ?> ">
            <span class="align-middle"><i>Starter Panel</i></span>
        </a>
        <ul class="sidebar-nav">
            
            <?php if (isset($MenuCategory) && is_array($MenuCategory)) : ?>
                <?php foreach ($MenuCategory as $mCategory) : ?>
                    <li class="sidebar-header">
                        <?= $mCategory['menu_category']; ?>
                    </li>
                    <?php
                    // THE FIX: Grab the role exactly the same way BaseController does!
                    $role = session()->get('role');
                    
                    $Menu = getMenu($mCategory['menuCategoryID'], $role);
                    foreach ($Menu as $menu) :
                        if ($menu['parent'] == 0) :
                    ?>
                            <li class="sidebar-item <?= (isset($segment) && $segment == $menu['url']) ? 'active' : ''; ?>">
                                <a class="sidebar-link" href="<?= base_url($menu['url']); ?> ">
                                    <i class="align-middle" data-feather="<?= $menu['icon']; ?>"></i> <span class="align-middle"><?= $menu['title']; ?></span>
                                </a>
                            </li>
                        <?php
                        else :
                            $SubMenu =  getSubMenu($menu['menu_id'], $role);
                        ?>
                            <li class="sidebar-item <?= (isset($segment) && $segment == $menu['url']) ? 'active' : ''; ?>">
                                <a data-bs-target="#<?= $menu['url'] ?>" data-bs-toggle="collapse" class="sidebar-link collapsed" aria-expanded="<?= (isset($segment) && $segment == $menu['url']) ? 'true' : 'false'; ?>">
                                    <i class="align-middle" data-feather="<?= $menu['icon']; ?>"></i> <span class="align-middle"><?= $menu['title']; ?></span>
                                </a>
                                <ul id="<?= $menu['url'] ?>" class="sidebar-dropdown list-unstyled collapse <?= (isset($segment) && $segment == $menu['url']) ? ' show' : ''; ?> " data-bs-parent="#sidebar">
                                    <?php foreach ($SubMenu as $subMenu) : ?>
                                        <li class="sidebar-item <?= (isset($subsegment) && $subsegment == $subMenu['url']) ? 'active' : ''; ?>">
                                            <a class="sidebar-link" href="<?= base_url($menu['url'] . '/' . $subMenu['url']); ?>">
                                                <?= $subMenu['title']; ?>
                                            </a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </li>
                    <?php
                        endif;
                    endforeach;
                    ?>
                <?php endforeach; ?> 
            <?php endif; ?>

            <?php if (session()->get('role') === 'teacher' || session()->get('role') == 2): ?>
                <li class="sidebar-header">
                    Teacher Area
                </li>
                <li class="sidebar-item <?= (isset($segment) && $segment == 'dashboard') ? 'active' : ''; ?>">
                    <a class="sidebar-link" href="<?= base_url('dashboard'); ?>">
                        <i class="align-middle" data-feather="home"></i> <span class="align-middle">Dashboard</span>
                    </a>
                </li>
            <?php endif; ?>

            <?php if (session()->get('role') === 'student' || session()->get('role') == 3): ?>
                <li class="sidebar-header">
                    Student Area
                </li>
                <li class="sidebar-item <?= (isset($subsegment) && $subsegment == 'dashboard') ? 'active' : ''; ?>">
                    <a class="sidebar-link" href="<?= base_url('student/dashboard'); ?>">
                        <i class="align-middle" data-feather="home"></i> <span class="align-middle">Dashboard</span>
                    </a>
                </li>
            <?php endif; ?>

            <?php if (session()->get('role') === 'admin' || session()->get('role') == 1): ?>
                <li class="sidebar-header">
                    Admin Area
                </li>
                <li class="sidebar-item <?= (isset($segment) && $segment == 'roles') ? 'active' : ''; ?>">
                    <a class="sidebar-link" href="<?= base_url('admin/roles'); ?>">
                        <i class="align-middle" data-feather="shield"></i> <span class="align-middle">Manage Roles</span>
                    </a>
                </li>
                <li class="sidebar-item <?= (isset($segment) && $segment == 'users') ? 'active' : ''; ?>">
                    <a class="sidebar-link" href="<?= base_url('admin/users'); ?>">
                        <i class="align-middle" data-feather="user-check"></i> <span class="align-middle">Assign User Roles</span>
                    </a>
                </li>
            <?php endif; ?>

            <li class="sidebar-header">
                Activity Pages
            </li>
            <li class="sidebar-item <?= (isset($segment) && $segment == 'about') ? 'active' : ''; ?>">
                <a class="sidebar-link" href="<?= base_url('about'); ?>">
                    <i class="align-middle" data-feather="info"></i> <span class="align-middle">About Us</span>
                </a>
            </li>
            <li class="sidebar-item <?= (isset($segment) && $segment == 'contact') ? 'active' : ''; ?>">
                <a class="sidebar-link" href="<?= base_url('contact'); ?>">
                    <i class="align-middle" data-feather="mail"></i> <span class="align-middle">Contact Us</span>
                </a>
            </li>
            <li class="sidebar-item <?= (isset($segment) && $segment == 'profile') ? 'active' : ''; ?>">
                <a class="sidebar-link" href="<?= base_url('profile'); ?>">
                    <i class="align-middle" data-feather="user"></i> <span class="align-middle">Profile</span>
                </a>
            </li>
            
            <?php if (session()->get('role') !== 'student' && session()->get('role') != 3): ?>
            <li class="sidebar-item <?= (isset($segment) && $segment == 'students') ? 'active' : ''; ?>">
                <a class="sidebar-link" href="<?= base_url('students') ?>">
                     <i class="align-middle" data-feather="users"></i> <span class="align-middle">Students</span>
                </a>
            </li>
            <?php endif; ?>

        </ul>
    </div>
</nav>