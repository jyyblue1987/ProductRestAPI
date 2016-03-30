@section('navmenu')
<div class="header-wrap">    
    <div id="header">
        <div id="logo">
            <a href="/" style="font-weight: bold;">Tijarti</a>
        </div>
		<?php
			$admin = $_SESSION["admin"];
		?>
        <div id="top_quick_links">
            <div class="nowrap">
                <a id="update_profile" href="/email">
                    <span>{{$admin->email}}</span>
                </a>
                <span class="top-signout" title="Sign out">
                    <a href="/logout" class="text-link">&nbsp;</a>
                </span>
            </div>
        </div>
        <div id="top_menu">
            <ul id="alt_menu"></ul>
        </div>
        <ul id="menu">
            <li class="dashboard dashboard-active">
                <a href="/" title="Home">&nbsp;</a>
            </li>

            
		     <li>
                <a class="drop">Seller</a>
                <div class="dropdown-column">
                    <div class="col">
                        <ul>
                            <li class="blank users">
                            	<a href="/seller">
                                    <span>Sellers</span>
                                    <span class="hint">Manage sellers that are registered at your store.</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
	
            
            <li>
                <a class="drop">Buyer</a>
                <div class="dropdown-column">
                    <div class="col">
                        <ul>
                            <li class="blank users">
                            	<a href="/buyer">
                                    <span>Buyers</span>
                                    <span class="hint">Manage buyers that are registered at your store.</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
	       	
			<li>
                <a class="drop">Categories</a>
                <div class="dropdown-column">
                    <div class="col">
                        <ul>
                            <li class="blank sales">
                            	<a href="/category">
                                    <span>Categories</span>
                                    <span class="hint">Create new categories and edit the existing ones.</span>
                                </a>
                            </li>							
							
                        </ul>
                    </div>
                </div>
            </li>	

			<li>
                <a class="drop">Shop</a>
                <div class="dropdown-column">
                    <div class="col">
                        <ul>
                            <li class="blank sales">
                            	<a href="/shop">
                                    <span>Shopes</span>
                                    <span class="hint">Create new shopes and edit the existing ones.</span>
                                </a>
                            </li>							
							
                        </ul>
                    </div>
                </div>
            </li>						
			
        </ul>
			
    </div>
</div>

@show


