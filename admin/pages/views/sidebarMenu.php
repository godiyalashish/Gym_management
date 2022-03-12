<div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebarItem">
                    <a href="#" class="sidebarLink active"><i class="fas fa-tachometer-alt icon"></i>Dashboard</a>
                </li>
                <li class="sidebarItem">
                    <a href="#" class="sidebarLink"><i class="fas fa-user-plus icon"></i>Add GymBoy</a>
                </li>
                <li class="sidebarItem">
                    <a href="#" class="sidebarLink"><i class="fas fa-users icon"></i>GymBoy List</a>
                </li>
                <li class="sidebarItem">
                    <a href="#" class="sidebarLink"><i class="fas fa-bolt icon"></i>Add Trainer</a>
                </li>
                <li class="sidebarItem">
                    <a href="#" class="sidebarLink"><i class="fas fa-user-friends icon"></i>Trainer List</a>
                </li>
                <li class="sidebarItem">
                    <a href="#" class="sidebarLink"><i class="fas fa-tags icon"></i>Services</a>
                </li>
            </ul>
        </div>


<script type="text/javascript">
    
document.addEventListener('DOMContentLoaded', function() {
const selector = '.sidebarLink';
const elems = Array.from( document.querySelectorAll( selector ) );
const navigation = document.querySelector( '.sidebar-nav' );

function makeActive( evt ) {
  const target = evt.target;
  
  if ( !target || !target.matches( selector ) ) {
    return;
  }
  
  elems.forEach( elem => elem.classList.remove( 'active' ) );
    
    evt.target.classList.add( 'active' );
};

navigation.addEventListener( 'mousedown', makeActive );

} );

</script>