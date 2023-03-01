<div class="account-nav">
  <ul class="list-group">
    @role('admin')
    <li class="list-group-item list-group-item-action {{ request()->segment(2) == 'dashboard' ? 'active': ''}}">
      <a href="{{route('account.dashboard')}}" class="account-nav-link">
        <i class="fas fa-chart-line"></i> Dashboard
      </a>
    </li>
    <li class="list-group-item list-group-item-action {{ request()->segment(2) == 'view-all-users' ? 'active': ''}}">
      <a href="{{route('account.viewAllUsers')}}" class="account-nav-link">
        <i class="fas fa-users"></i> View All Users
      </a>
    </li>
    <li class="list-group-item list-group-item-action {{ request()->segment(2) == 'check-referal-admin' ? 'active': ''}}">
      <a href="{{route('account.check-referal-admin')}}" class="account-nav-link">
        <i class="fas fa-file"></i> View Requests
      </a>
    </li>
    @endrole
   
   
    @role('user')
    <li class="list-group-item list-group-item-action {{ request()->segment(2) == 'refer-someone-view' ? 'active': ''}}">
      <a href="{{route('account.referSomeoneView')}}" class="account-nav-link">
        <i class="fas fa-user-shield"></i> Add Client
      </a>
    </li>
    <li class="list-group-item list-group-item-action {{ request()->segment(2) == 'upload-qualifications' ? 'active': ''}}">
      <a href="{{route('account.uploadQualificationsView')}}" class="account-nav-link">
        <i class="fas fa-copy"></i> Upload Qualifications
      </a>
    </li>

    <li class="list-group-item list-group-item-action {{ request()->segment(2) == 'check-referal' ? 'active': ''}}">
      <a href="{{route('account.check-referal')}}" class="account-nav-link">
        <i class="fas fa-stream"></i> My Clients
      </a>
    </li>   
    @endrole
    <li class="list-group-item list-group-item-action {{ request()->segment(2) == 'change-password' ? 'active': ''}}">
      <a href="{{route('account.changePassword')}}" class="account-nav-link">
        <i class="fas fa-fingerprint"></i> Change Password
      </a>
    </li>    
    
     <li class="list-group-item list-group-item-action {{ request()->segment(2) == 'deactivate' ? 'active': ''}}">
      <a href="{{route('account.deactivate')}}" class="account-nav-link">
        <i class="fas fa-folder-minus"></i> Deactivate Account
      </a>
    </li>    
  </ul>
</div>