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
                            	<a href="/product1">
                                    <span>Product1</span>
                                    <span class="hint">Manage products 1 that are registered at your store.</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>           
			<li>
                <a class="drop">Product2</a>
                <div class="dropdown-column">
                    <div class="col">
                        <ul>
                            <li class="blank users">
                            	<a href="/product2">
                                    <span>Product2</span>
                                    <span class="hint">Manage products 2 that are registered at your store.</span>
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


