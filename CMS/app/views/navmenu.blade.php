@section('navmenu')
<div class="header-wrap">    
    <div id="header">
        <div id="logo">
            <a href="/" style="font-weight: bold;">Product</a>
        </div>
		
        <div id="top_menu">
            <ul id="alt_menu"></ul>
        </div>
        <ul id="menu">
            <li class="dashboard dashboard-active">
                <a href="/" title="Home">&nbsp;</a>
            </li>

            
		     <li>
                <a class="drop">Product</a>
                <div class="dropdown-column">
                    <div class="col">
                        <ul>
                            <li class="blank users">
                            	<a href="/product">
                                    <span>Product</span>
                                    <span class="hint">Manage products that are registered at your store.</span>
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


