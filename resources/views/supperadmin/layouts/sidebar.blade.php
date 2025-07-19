<div class="deznav">
    <div class="deznav-scroll">
        <ul class="metismenu" id="menu">
            <!-- Dashboard -->
            <li>
                <a href="{{route('store.dash')}}" class="ai-icon">
                    <i class="fas fa-home"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>

            <!-- Subscription Management -->
            <li>
                <a class="has-arrow ai-icon" href="javascript:void(0)">
                    <i class="fas fa-crown"></i>
                    <span class="nav-text">Subscription</span>
                </a>
                <ul aria-expanded="false" style="width:260px;">
                    <li><a href="{{route('subsciptionadd')}}"><i class="fas fa-plus-circle"></i> New Subscription</a></li>
                    <li><a href="{{route('sub.list')}}"><i class="fas fa-list"></i> Subscription List</a></li>
                    <li><a href="{{route('method.add')}}"><i class="fas fa-credit-card"></i> Sub Methods</a></li>
                </ul>
            </li>

            <!-- User Management -->
            <li>
                <a class="has-arrow ai-icon" href="javascript:void(0)">
                    <i class="fas fa-users"></i>
                    <span class="nav-text">User Management</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{route('supper.userlist')}}"><i class="fas fa-user-friends"></i> View Users</a></li>
                {{--     <li><a href="{{route('supper.add')}}"><i class="fas fa-user-plus"></i> Add User</a></li> --}}
                    <li><a href="{{route('country.list')}}"><i class="fas fa-globe"></i> Country List</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<style>
	/* Sidebar Container */
.deznav {
  
    background: #2c3e50;
  
   
    box-shadow: 2px 0 10px rgba(0,0,0,0.1);
}



/* Hide scrollbar but keep functionality */


.deznav-scroll::-webkit-scrollbar-thumb {
    background: #34495e;
    border-radius: 5px;
}

/* Menu Items */


.metismenu a {
    display: flex;
    align-items: center;
 
    color: #ecf0f1;
    text-decoration: none;
    border-radius: 8px;

}

.metismenu a:hover {
    background: #34495e;
    color: #3498db;
}

/* Icons */
.metismenu .ai-icon i {
    width: 20px;
    margin-right: 10px;
    font-size: 18px;
}

/* Submenu */











/* Active States */


/* Responsive Design */
/* Animation for menu items */



 
</style>
