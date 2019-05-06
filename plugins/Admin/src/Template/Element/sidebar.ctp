<?php
use Cake\Routing\Router;
$session = $this->request->session();
$controller = strtolower ($this->request->params['controller']);
$action = strtolower ($this->request->action);
?>
<aside class="sidebar">
    <div class="sidebar-container">
        <div class="sidebar-header">
            <div class="brand">
                <a href="<?php echo Router::url('/admin/',true); ?>">
                    <img src="<?php echo Router::url("/admin/images/logo-innr.png",true); ?>" width="90%">
                </a>
            </div>
        </div>
        <nav class="menu">
            <ul class="nav metismenu" id="sidebar-menu">
                <!-- Dashboard start -->
                <li class="<?php if($this->request->params['controller'] == 'AdminDetails' && $this->request->params['action'] == 'dashboard'): echo "active"; endif; ?>">
                    <a href="<?php echo Router::url(['controller' => 'admin-details', 'action' => 'dashboard']); ?>"> <i class="fa fa-home"></i> Dashboard </a>
                </li>
                <!-- Dashboard end -->
				
                <!-- Admin Users start-->				
			<?php /*if( (!empty($session->read('AdminUser')) && $session->read('AdminUser.type')=='SA') || (!empty($session->read('permissions.'.strtolower('AdminDetails')))) ){?>
				<li class="<?php if($this->request->params['controller'] == 'AdminDetails' && $this->request->params['action'] != 'dashboard'): echo "active open"; endif; ?>">
                    <a href="<?php echo Router::url(['controller' => 'AdminDetails']); ?>">
                        <i class="fa fa-user fa-fw"></i>Manage Sub Admin <i class="fa arrow"></i>
                    </a>
					<ul>
					<?php if( (!empty($session->read('AdminUser')) && $session->read('AdminUser.type')=='SA') || (!empty($session->read('permissions.'.strtolower('AdminDetails'))) && $session->read('permissions.'.strtolower('AdminDetails').'.'.strtolower('list-sub-admin'))==1) ){?>
                        <li class="<?php if($this->request->params['controller'] == 'AdminDetails' && $this->request->params['action'] == 'list-sub-admin'): echo "active"; endif; ?>">
                            <a href="<?php echo Router::url(['controller' => 'AdminDetails', 'action' => 'list-sub-admin']); ?>">
								<i class="fa fa-list-alt"></i>&nbsp;
								View All
							</a>
                        </li>
					<?php } ?>
					<?php if( (!empty($session->read('AdminUser')) && $session->read('AdminUser.type')=='SA') || (!empty($session->read('permissions.'.strtolower('AdminDetails'))) && $session->read('permissions.'.strtolower('AdminDetails').'.'.strtolower('add-sub-admin'))==1) ){?>
                        <li class="<?php if($this->request->params['controller'] == 'AdminDetails' && $this->request->params['action'] == 'add-sub-admin'): echo "active"; endif; ?>">
                            <a href="<?php echo Router::url(['controller' => 'AdminDetails', 'action' => 'add-sub-admin']); ?>">
                                <i class="fa fa-plus"></i>&nbsp;
                                Add
                            </a>
                        </li>
					<?php } ?>
                    </ul>
                </li>
			<?php }*/ ?>
                 <!--Admin Users end -->

                <!-- User Management start -->
			<?php if( (!empty($session->read('AdminUser')) && $session->read('AdminUser.type')=='SA') || (!empty($session->read('permissions.'.strtolower('Users')))) ){?>
                <li class="<?php if($this->request->params['controller'] == 'Users' && $this->request->params['action'] != 'dashboard'): echo "active open"; endif; ?>">
                    <a href="<?php echo Router::url(['controller' => 'users']); ?>">
                        <i class="fa fa-users"></i>
                        User Management
						<i class="fa arrow"></i>
                    </a>
					<ul>
					<?php if( (!empty($session->read('AdminUser')) && $session->read('AdminUser.type')=='SA') || (!empty($session->read('permissions.'.strtolower('Users'))) && $session->read('permissions.'.strtolower('Users').'.'.strtolower('list-data'))==1) ){?>
                        <li class="<?php if($this->request->params['controller'] == 'Users' && $this->request->params['action'] == 'listData'): echo "active"; endif; ?>">
                            <a href="<?php echo Router::url(['controller' => 'Users', 'action' => 'list-data']); ?>">
								<i class="fa fa-list-alt"></i>&nbsp;
								View All
							</a>
                        </li>
					<?php } ?>
					<?php if( (!empty($session->read('AdminUser')) && $session->read('AdminUser.type')=='SA') || (!empty($session->read('permissions.'.strtolower('Users'))) && $session->read('permissions.'.strtolower('Users').'.'.strtolower('add-user'))==1) ){?>
                        <li class="<?php if($this->request->params['controller'] == 'Users' && $this->request->params['action'] == 'add-user'): echo "active"; endif; ?>">
                            <a href="<?php echo Router::url(['controller' => 'Users', 'action' => 'add-user']); ?>">
                                <i class="fa fa-plus"></i>&nbsp;
                                Add
                            </a>
                        </li>
					<?php } ?>
                    </ul>
                </li>
			<?php } ?>
                <!-- User Management end -->
				
				<!-- Mortgage Status Management start -->
			<?php if( (!empty($session->read('AdminUser')) && $session->read('AdminUser.type')=='SA') || (!empty($session->read('permissions.'.strtolower('MortgageStatuses')))) ){?>
                <li class="<?php if($this->request->params['controller'] == 'MortgageStatuses' && $this->request->params['action'] != 'dashboard'): echo "active open"; endif; ?>">
                    <a href="<?php echo Router::url(['controller' => 'mortgage-statuses']); ?>">
                        <i class="fa fa-users"></i>
                        Mortgage Management
						<i class="fa arrow"></i>
                    </a>
					<ul>
					<?php if( (!empty($session->read('AdminUser')) && $session->read('AdminUser.type')=='SA') || (!empty($session->read('permissions.'.strtolower('MortgageStatuses'))) && $session->read('permissions.'.strtolower('MortgageStatuses').'.'.strtolower('list-data'))==1) ){?>
                        <li class="<?php if($this->request->params['controller'] == 'MortgageStatuses' && $this->request->params['action'] == 'listData'): echo "active"; endif; ?>">
                            <a href="<?php echo Router::url(['controller' => 'MortgageStatuses', 'action' => 'list-data']); ?>">
								<i class="fa fa-list-alt"></i>&nbsp;
								View All
							</a>
                        </li>
					<?php } ?>
					<?php if( (!empty($session->read('AdminUser')) && $session->read('AdminUser.type')=='SA') || (!empty($session->read('permissions.'.strtolower('MortgageStatuses'))) && $session->read('permissions.'.strtolower('MortgageStatuses').'.'.strtolower('add-mortgage-status'))==1) ){?>
                        <li class="<?php if($this->request->params['controller'] == 'MortgageStatuses' && $this->request->params['action'] == 'add-mortgage-status'): echo "active"; endif; ?>">
                            <a href="<?php echo Router::url(['controller' => 'MortgageStatuses', 'action' => 'add-mortgage-status']); ?>">
                                <i class="fa fa-plus"></i>&nbsp;
                                Add
                            </a>
                        </li>
					<?php } ?>
                    </ul>
                </li>
			<?php } ?>
                <!-- Mortgage Status Management end -->
				
				<!-- Property for Sell and Buy Management end -->
			<?php if( (!empty($session->read('AdminUser')) && $session->read('AdminUser.type')=='SA') || (!empty($session->read('permissions.'.strtolower('Submissions')))) ){?>
                <li class="<?php if($this->request->params['controller'] == 'Submissions' && ($this->request->params['action'] == 'propertySellListData' || $this->request->params['action'] == 'matchingPropertyBuyListData' || $this->request->params['action'] == 'viewPropertySell')): echo "active open"; endif; ?>">
                    <a href="<?php echo Router::url(['controller' => 'submissions', 'action' => 'property-sell-list-data']);?>">
                        <i class="fa fa-home"></i>
                        Property For Sell
                    </a>
                </li>
				<li class="<?php if($this->request->params['controller'] == 'Submissions' && ($this->request->params['action'] == 'propertyBuyListData' || $this->request->params['action'] == 'matchingPropertySellListData' || $this->request->params['action'] == 'viewPropertyBuy')): echo "active open"; endif; ?>">
                    <a href="<?php echo Router::url(['controller' => 'submissions', 'action' => 'property-buy-list-data']); ?>">
                        <i class="fa fa-home"></i>
                        Property To Buy
                    </a>
                </li>
			<?php } ?>
                <!-- Property for Sell and Buy Management start -->
				
				<!-- Banner start -->
			<?php if( (!empty($session->read('AdminUser')) && $session->read('AdminUser.type')=='SA') || (!empty($session->read('permissions.'.strtolower('BannerSections')))) ){?>
                <li class="<?php if($this->request->params['controller'] == 'BannerSections'): echo "active open"; endif; ?>">
                    <a href="">
                        <i class="fa fa-picture-o"></i>
                        Banner Management
                        <i class="fa arrow"></i>
                    </a>
                    <ul>
					<?php if( (!empty($session->read('AdminUser')) && $session->read('AdminUser.type')=='SA') || (!empty($session->read('permissions.'.strtolower('BannerSections'))) && $session->read('permissions.'.strtolower('BannerSections').'.'.strtolower('list-data'))==1) ){?>
                        <li class="<?php if($this->request->params['controller'] == 'BannerSections' && $this->request->params['action'] == 'listData'): echo "active"; endif; ?>">
                            <a href="<?php echo Router::url(['controller' => 'banner-sections', 'action' => 'list-data']); ?>">
                               <i class="fa fa-list-alt"></i>&nbsp;
                               View All
                            </a>
                        </li>
					<?php } ?>
					<?php if( (!empty($session->read('AdminUser')) && $session->read('AdminUser.type')=='SA') || (!empty($session->read('permissions.'.strtolower('BannerSections'))) && $session->read('permissions.'.strtolower('BannerSections').'.'.strtolower('add-banner-section'))==1) ){?>
						<li class="<?php if($this->request->params['controller'] == 'BannerSections' && $this->request->params['action'] == 'addBannerSection'): echo "active"; endif; ?>">
                            <a href="<?php echo Router::url(['controller' => 'banner-sections', 'action' => 'add-banner-section']); ?>">
                                <i class="fa fa-plus"></i>&nbsp;
                                Add
                            </a>
                        </li>
					<?php } ?>
                    </ul>
                </li>
			<?php } ?>
                <!-- Banner end -->
				
				<!-- Testimonial start -->
			<?php if( (!empty($session->read('AdminUser')) && $session->read('AdminUser.type')=='SA') || (!empty($session->read('permissions.'.strtolower('Testimonials')))) ){?>
                <li class="<?php if($this->request->params['controller'] == 'Testimonials'): echo "active open"; endif; ?>">
                    <a href="">
                        <i class="fa fa-comment"></i>
                        Testimonial Management
                        <i class="fa arrow"></i>
                    </a>
                    <ul>
					<?php if( (!empty($session->read('AdminUser')) && $session->read('AdminUser.type')=='SA') || (!empty($session->read('permissions.'.strtolower('Testimonials'))) && $session->read('permissions.'.strtolower('Testimonials').'.'.strtolower('list-data'))==1) ){?>
                        <li class="<?php if($this->request->params['controller'] == 'Testimonials' && $this->request->params['action'] == 'listData'): echo "active"; endif; ?>">
                            <a href="<?php echo Router::url(['controller' => 'testimonials', 'action' => 'list-data']); ?>">
                               <i class="fa fa-list-alt"></i>&nbsp;
                               View All
                            </a>
                        </li>
					<?php } ?>
					<?php if( (!empty($session->read('AdminUser')) && $session->read('AdminUser.type')=='SA') || (!empty($session->read('permissions.'.strtolower('Testimonials'))) && $session->read('permissions.'.strtolower('Testimonials').'.'.strtolower('add-testimonial'))==1) ){?>
						<li class="<?php if($this->request->params['controller'] == 'Testimonials' && $this->request->params['action'] == 'addTestimonial'): echo "active"; endif; ?>">
                            <a href="<?php echo Router::url(['controller' => 'testimonials', 'action' => 'add-testimonial']); ?>">
                                <i class="fa fa-plus"></i>&nbsp;
                                Add
                            </a>
                        </li>
					<?php } ?>
                    </ul>
                </li>
			<?php } ?>
                <!-- Testimonial end -->
				
				<!-- Service start -->
			<?php if( (!empty($session->read('AdminUser')) && $session->read('AdminUser.type')=='SA') || (!empty($session->read('permissions.'.strtolower('Services')))) ){?>
                <li class="<?php if($this->request->params['controller'] == 'Services'): echo "active open"; endif; ?>">
                    <a href="">
                        <i class="fa fa-info-circle"></i>
                        Service Management
                        <i class="fa arrow"></i>
                    </a>
                    <ul>
					<?php if( (!empty($session->read('AdminUser')) && $session->read('AdminUser.type')=='SA') || (!empty($session->read('permissions.'.strtolower('Services'))) && $session->read('permissions.'.strtolower('Services').'.'.strtolower('list-data'))==1) ){?>
                        <li class="<?php if($this->request->params['controller'] == 'Services' && $this->request->params['action'] == 'listData'): echo "active"; endif; ?>">
                            <a href="<?php echo Router::url(['controller' => 'services', 'action' => 'list-data']); ?>">
                               <i class="fa fa-list-alt"></i>&nbsp;
                               View All
                            </a>
                        </li>
					<?php } ?>
					<?php if( (!empty($session->read('AdminUser')) && $session->read('AdminUser.type')=='SA') || (!empty($session->read('permissions.'.strtolower('Services'))) && $session->read('permissions.'.strtolower('Services').'.'.strtolower('add-service'))==1) ){?>
						<li class="<?php if($this->request->params['controller'] == 'Services' && $this->request->params['action'] == 'addService'): echo "active"; endif; ?>">
                            <a href="<?php echo Router::url(['controller' => 'services', 'action' => 'add-service']); ?>">
                                <i class="fa fa-plus"></i>&nbsp;
                                Add
                            </a>
                        </li>
					<?php } ?>
                    </ul>
                </li>
			<?php } ?>
                <!-- Service end -->
				
				<!-- Howitworks start -->
			<?php if( (!empty($session->read('AdminUser')) && $session->read('AdminUser.type')=='SA') || (!empty($session->read('permissions.'.strtolower('Howitworks')))) ){?>
                <li class="<?php if($this->request->params['controller'] == 'Howitworks'): echo "active open"; endif; ?>">
                    <a href="">
                        <i class="fa fa-briefcase"></i>
                        Howitwork Management
                        <i class="fa arrow"></i>
                    </a>
                    <ul>
					<?php if( (!empty($session->read('AdminUser')) && $session->read('AdminUser.type')=='SA') || (!empty($session->read('permissions.'.strtolower('Howitworks'))) && $session->read('permissions.'.strtolower('Howitworks').'.'.strtolower('list-data'))==1) ){?>
                        <li class="<?php if($this->request->params['controller'] == 'Howitworks' && $this->request->params['action'] == 'listData'): echo "active"; endif; ?>">
                            <a href="<?php echo Router::url(['controller' => 'howitworks', 'action' => 'list-data']); ?>">
                               <i class="fa fa-list-alt"></i>&nbsp;
                               View All
                            </a>
                        </li>
					<?php } ?>
					<?php if( (!empty($session->read('AdminUser')) && $session->read('AdminUser.type')=='SA') || (!empty($session->read('permissions.'.strtolower('Howitworks'))) && $session->read('permissions.'.strtolower('Howitworks').'.'.strtolower('add'))==1) ){?>
						<li class="<?php if($this->request->params['controller'] == 'Howitworks' && $this->request->params['action'] == 'add'): echo "active"; endif; ?>">
                            <a href="<?php echo Router::url(['controller' => 'howitworks', 'action' => 'add']); ?>">
                                <i class="fa fa-plus"></i>&nbsp;
                                Add
                            </a>
                        </li>
					<?php } ?>
                    </ul>
                </li>
			<?php } ?>
                <!-- Howitworks end -->
				
				<!-- Property Type start -->
			<?php if( (!empty($session->read('AdminUser')) && $session->read('AdminUser.type')=='SA') || (!empty($session->read('permissions.'.strtolower('Properties')))) ){?>
                <li class="<?php if($this->request->params['controller'] == 'Properties'): echo "active open"; endif; ?>">
                    <a href="">
                        <i class="fa fa-stack-overflow"></i>
                        Property Management
                        <i class="fa arrow"></i>
                    </a>
                    <ul>
					<?php if( (!empty($session->read('AdminUser')) && $session->read('AdminUser.type')=='SA') || (!empty($session->read('permissions.'.strtolower('Properties'))) && $session->read('permissions.'.strtolower('Properties').'.'.strtolower('list-data'))==1) ){?>
                        <li class="<?php if($this->request->params['controller'] == 'Properties' && $this->request->params['action'] == 'listData'): echo "active"; endif; ?>">
                            <a href="<?php echo Router::url(['controller' => 'properties', 'action' => 'list-data']); ?>">
                               <i class="fa fa-list-alt"></i>&nbsp;
                               View All
                            </a>
                        </li>
					<?php } ?>
					<?php if( (!empty($session->read('AdminUser')) && $session->read('AdminUser.type')=='SA') || (!empty($session->read('permissions.'.strtolower('Properties'))) && $session->read('permissions.'.strtolower('Properties').'.'.strtolower('add-property'))==1) ){?>
						<li class="<?php if($this->request->params['controller'] == 'Properties' && $this->request->params['action'] == 'addProperty'): echo "active"; endif; ?>">
                            <a href="<?php echo Router::url(['controller' => 'properties', 'action' => 'add-property']); ?>">
                                <i class="fa fa-plus"></i>&nbsp;
                                Add
                            </a>
                        </li>
					<?php } ?>
                    </ul>
                </li>
			<?php } ?>
                <!-- Property Type end -->
				
				<!-- Price start -->
			<?php if( (!empty($session->read('AdminUser')) && $session->read('AdminUser.type')=='SA') || (!empty($session->read('permissions.'.strtolower('Prices')))) ){?>
                <li class="<?php if($this->request->params['controller'] == 'Prices'): echo "active open"; endif; ?>">
                    <a href="">
                        <i class="fa fa-rss-square"></i>
                        Price Management
                        <i class="fa arrow"></i>
                    </a>
                    <ul>
					<?php if( (!empty($session->read('AdminUser')) && $session->read('AdminUser.type')=='SA') || (!empty($session->read('permissions.'.strtolower('Prices'))) && $session->read('permissions.'.strtolower('Prices').'.'.strtolower('list-data'))==1) ){?>
                        <li class="<?php if($this->request->params['controller'] == 'Prices' && $this->request->params['action'] == 'listData'): echo "active"; endif; ?>">
                            <a href="<?php echo Router::url(['controller' => 'prices', 'action' => 'list-data']); ?>">
                               <i class="fa fa-list-alt"></i>&nbsp;
                               View All
                            </a>
                        </li>
					<?php } ?>
					<?php if( (!empty($session->read('AdminUser')) && $session->read('AdminUser.type')=='SA') || (!empty($session->read('permissions.'.strtolower('Prices'))) && $session->read('permissions.'.strtolower('Prices').'.'.strtolower('add'))==1) ){?>
						<li class="<?php if($this->request->params['controller'] == 'Prices' && $this->request->params['action'] == 'addPrice'): echo "active"; endif; ?>">
                            <a href="<?php echo Router::url(['controller' => 'prices', 'action' => 'add-price']); ?>">
                                <i class="fa fa-plus"></i>&nbsp;
                                Add
                            </a>
                        </li>
					<?php } ?>
                    </ul>
                </li>
			<?php } ?>
                <!-- Price end -->
				
				<!-- Plan start -->
			<?php if( (!empty($session->read('AdminUser')) && $session->read('AdminUser.type')=='SA') || (!empty($session->read('permissions.'.strtolower('Plans')))) ){?>
                <li class="<?php if($this->request->params['controller'] == 'Plans'): echo "active open"; endif; ?>">
                    <a href="">
                        <i class="fa fa-globe"></i>
                        Plan Management
                        <i class="fa arrow"></i>
                    </a>
                    <ul>
					<?php if( (!empty($session->read('AdminUser')) && $session->read('AdminUser.type')=='SA') || (!empty($session->read('permissions.'.strtolower('Plans'))) && $session->read('permissions.'.strtolower('Plans').'.'.strtolower('list-data'))==1) ){?>
                        <li class="<?php if($this->request->params['controller'] == 'Plans' && $this->request->params['action'] == 'listData'): echo "active"; endif; ?>">
                            <a href="<?php echo Router::url(['controller' => 'plans', 'action' => 'list-data']); ?>">
                               <i class="fa fa-list-alt"></i>&nbsp;
                               View All
                            </a>
                        </li>
					<?php } ?>
					<?php if( (!empty($session->read('AdminUser')) && $session->read('AdminUser.type')=='SA') || (!empty($session->read('permissions.'.strtolower('Plan'))) && $session->read('permissions.'.strtolower('Plan').'.'.strtolower('add-plan'))==1) ){?>
						<li class="<?php if($this->request->params['controller'] == 'Plan' && $this->request->params['action'] == 'addPlan'): echo "active"; endif; ?>">
                            <a href="<?php echo Router::url(['controller' => 'plans', 'action' => 'add-plan']); ?>">
                                <i class="fa fa-plus"></i>&nbsp;
                                Add
                            </a>
                        </li>
					<?php } ?>
                    </ul>
                </li>
			<?php } ?>
                <!-- Plan end -->
				
				<!-- Contacts Management end -->
			<?php if( (!empty($session->read('AdminUser')) && $session->read('AdminUser.type')=='SA') || (!empty($session->read('permissions.'.strtolower('Contacts')))) ){?>
                <li class="<?php if($this->request->params['controller'] == 'Contacts'): echo "active open"; endif; ?>">
                    <a href="<?php echo Router::url(['controller' => 'contacts', 'action' => 'list-data']); ?>">
                        <i class="fa fa-envelope"></i>
                        Contacts Management
                    </a>
                </li>
			<?php } ?>
                <!-- Contacts Management start --> 
                
				<?php /*<!-- Newsletter Subscriptions Management end -->
                <li class="<?php if($this->request->params['controller'] == 'NewsletterSubscriptions'): echo "active open"; endif; ?>">
                    <a href="<?php echo Router::url(['controller' => 'newsletter-subscriptions', 'action' => 'list-data']); ?>">
                        <i class="fa fa-location-arrow"></i>
                        Newsletter Subscriber
                    </a>
                </li>
                <!-- Newsletter Subscriptions Management start -->*/?>
				
                <!-- Cms Management end -->
			<?php if( (!empty($session->read('AdminUser')) && $session->read('AdminUser.type')=='SA') || (!empty($session->read('permissions.'.strtolower('Cms')))) ){?>
                <li class="<?php if($this->request->params['controller'] == 'Cms'): echo "active open"; endif; ?>">
                    <a href="<?php echo Router::url(['controller' => 'cms', 'action' => 'list-data']); ?>">
                        <i class="fa fa-book"></i>
                        CMS Management
                    </a>
                </li>
			<?php } ?>
                <!-- Cms Management start -->
				
				<?php /*<!-- Settings Management start -->
                <li class="<?php if($this->request->params['controller'] == 'Settings'): echo "active open"; endif; ?>">
                    <a href="<?php echo Router::url(['controller' => 'settings']); ?>">
                        <i class="fa fa-cogs"></i>
                        Website Settings
                    </a>
                </li>
                <!-- Settings Management end -->
				*/ ?>
            </ul>
        </nav>
    </div>
    <footer class="sidebar-footer">
        <ul class="nav metismenu" id="customize-menu">
            <li>
                <ul>
                    <li class="customize">
                        <div class="customize-item">
                            <div class="row customize-header">
                                <div class="col-xs-4"> </div>
                                <div class="col-xs-4"> <label class="title">fixed</label> </div>
                                <div class="col-xs-4"> <label class="title">static</label> </div>
                            </div>
                            <div class="row hidden-md-down">
                                <div class="col-xs-4"> <label class="title">Sidebar:</label> </div>
                                <div class="col-xs-4"> <label>
	                        <input class="radio" type="radio" name="sidebarPosition" value="sidebar-fixed" >
	                        <span></span>
	                    </label> </div>
                                <div class="col-xs-4"> <label>
	                        <input class="radio" type="radio" name="sidebarPosition" value="">
	                        <span></span>
	                    </label> </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-4"> <label class="title">Header:</label> </div>
                                <div class="col-xs-4"> <label>
	                        <input class="radio" type="radio" name="headerPosition" value="header-fixed">
	                        <span></span>
	                    </label> </div>
                                <div class="col-xs-4"> <label>
	                        <input class="radio" type="radio" name="headerPosition" value="">
	                        <span></span>
	                    </label> </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-4"> <label class="title">Footer:</label> </div>
                                <div class="col-xs-4"> <label>
	                        <input class="radio" type="radio" name="footerPosition" value="footer-fixed">
	                        <span></span>
	                    </label> </div>
                                <div class="col-xs-4"> <label>
	                        <input class="radio" type="radio" name="footerPosition" value="">
	                        <span></span>
	                    </label> </div>
                            </div>
                        </div>
                    </li>
                </ul>
                <a href=""> <i class="fa fa-cog"></i> Customize </a>
            </li>
        </ul>
    </footer>
</aside>
<div class="sidebar-overlay" id="sidebar-overlay"></div>