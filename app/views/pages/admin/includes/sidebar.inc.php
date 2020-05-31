<div class="sidebar">
    <nav>
        <a href="<?php echo URLROOT; ?>/admins/index">Dash<span>board</span></a>
         <img 
            src="<?php echo URLROOT . "/public/assets/img/" . $data['user'] -> image; ?>" 
            class="sidebar__profile"
        >
        <?php if(!$data['admin']) : ?>
            <ul>
                <li><a href="<?php echo URLROOT; ?>/pages/index"> <i class="fas fa-home"></i> Home</a></li>
                <li><a href="<?php echo URLROOT; ?>/admins/inbox"><i class="fas fa-inbox"></i> Inbox</a></li>
                <li><a href="<?php echo URLROOT; ?>/admins/postevent"><i class="fas fa-calendar-week"></i> Post an event</a></li>
                <li><a href="<?php echo URLROOT; ?>/admins/getposts"><i class="far fa-file"></i> Your Posts</a></li>
                <li><a href="<?php echo URLROOT; ?>/admins/addpost"><i class="far fa-edit"></i> Add Post</a></li>
                <li><a href="<?php echo URLROOT; ?>/admins/settings"><i class="fas fa-cog"></i> Settings</a></li>
                <li>
                    <a href="<?php echo URLROOT; ?>/users/logout" class="Navbar__Link">
                    <i class="fa fa-sign-out" aria-hidden="true"></i>
                    Logg ut
                    </a>
                </li>
            </ul>
        <?php else : ?>
        <ul>
            <li><a href="<?php echo URLROOT; ?>/pages/index"> <i class="fas fa-home"></i> Home</a></li>
            <li><a href="<?php echo URLROOT; ?>/admins/inbox"><i class="fas fa-inbox"></i> Inbox</a></li>
            <li><a href="<?php echo URLROOT; ?>/admins/postevent"><i class="fas fa-calendar-week"></i> Post an event</a></li>
            <li><a href="<?php echo URLROOT; ?>/admins/allposts"><i class="fas fa-copy"></i> View All Posts</a></li>
            <li><a href="<?php echo URLROOT; ?>/admins/getposts"><i class="far fa-file"></i> Your Posts</a></li>
            <li><a href="<?php echo URLROOT; ?>/admins/addpost"><i class="far fa-edit"></i> Add Post</a></li>
            <li><a href="<?php echo URLROOT; ?>/admins/users"><i class="fas fa-users"></i> All Users</a></li>
            <li><a href="<?php echo URLROOT; ?>/admins/usersreported"><i class="far fa-flag"></i> User Reported</a></li>
            <li><a href="<?php echo URLROOT; ?>/admins/settings"><i class="fas fa-cog"></i> Settings</a></li>
            <li>
                <a href="<?php echo URLROOT; ?>/users/logout" class="Navbar__Link">
                    <i class="fa fa-sign-out" aria-hidden="true"></i>
                    Logg ut
                </a>
            </li>
        </ul>
        <?php endif; ?>
    </nav>
</div>