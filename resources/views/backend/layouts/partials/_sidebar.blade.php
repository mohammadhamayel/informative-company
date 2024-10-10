<nav id="sidebarMenu" class="sidebar d-lg-block bg-gray-800 text-white collapse" data-simplebar>
	<div class="sidebar-inner px-2 pt-3">
		@include('backend.layouts.partials._sidebar_user_card')
		
		<ul class="nav flex-column pt-3 pt-md-0">
			{{--Sidebar Logo--}}
			<a href="{{ route('admin.dashboard') }}" class="nav-link d-flex align-items-center d-none d-md-block">
		          <span class="sidebar-icon">
		            <img src="{{ asset(setting('light_logo')) }}" height="40" alt="Volt Logo">
		          </span>
			</a>
			
			{{--Dashboard Route--}}
			<li class="pt-3 nav-item {{ isActive('admin.dashboard') }}">
				<a href="{{ route('admin.dashboard') }}" class="nav-link">
			          <span class="sidebar-icon">
						 <x-svg i="dashboard"/>
			          </span>
					<span class="sidebar-text">{{ __('Dashboard') }}</span>
				</a>
			</li>
			
			{{--Navigation Route--}}
			<li class="nav-item">
		        <span class="nav-link  collapsed  d-flex justify-content-between align-items-center" data-bs-toggle="collapse" data-bs-target="#submenu-nav"
		              aria-expanded="{{ isActive(['admin.navigation*']) ? 'true' : 'false' }}">
		          <span>
		            <span class="sidebar-icon">
		              <x-svg i="bar"/>
		            </span>
		            <span class="sidebar-text">{{ __('Navigation') }}</span>
		          </span>
		          <span class="link-arrow">
		            <x-svg i="arrow-right"/>
		          </span>
		        </span>
				<div class="multi-level collapse {{ isActive(['admin.navigation*']) }}"
				     role="list" id="submenu-nav" aria-expanded="false">
					<ul class="flex-column nav">
						<li class="nav-item {{ isActive('admin.navigation.site.index') }}">
							
							<a class="nav-link" href="{{ route('admin.navigation.site.index') }}">
								<span class="sidebar-text">{{ __('Manage Navigation') }}</span>
							</a>
						</li>
						<li class="nav-item {{ isActive('admin.navigation.type', 'header') }}">
							<a class="nav-link" href="{{ route('admin.navigation.type', 'header') }}">
								<span class="sidebar-text">{{ __('Header Navigation') }}</span>
							</a>
						</li>
						<li class="nav-item {{ isActive('admin.navigation.type', 'footer') }}">
							<a class="nav-link" href="{{ route('admin.navigation.type', 'footer') }}">
								<span class="sidebar-text">{{ __('Footer Navigation') }}</span>
							</a>
						</li>
					
					</ul>
				</div>
			</li>
			
			{{--Page Route--}}
			<li class="nav-item {{ isActive('admin.page.component*') }}">
				<a href="{{ route('admin.page.component.index') }}" class="nav-link">
			          <span class="sidebar-icon">
						 <x-svg i="component2"/>
			          </span>
					<span class="sidebar-text">{{ __('Page Component') }}</span>
				</a>
			</li>
			<li class="nav-item {{ isActive('admin.page.site*') }}">
				<a href="{{ route('admin.page.site.index') }}" class="nav-link">
			          <span class="sidebar-icon">
						 <x-svg i="page"/>
			          </span>
					<span class="sidebar-text">{{ __('Page Manage') }}</span>
				</a>
			</li>
			<li class="nav-item {{ isActive('admin.header*') }}">
				<a href="{{ route('admin.header.index') }}" class="nav-link">
			          <span class="sidebar-icon">
						 <x-svg i="window"/>
			          </span>
					<span class="sidebar-text">{{ __('Header Manage') }}</span>
				</a>
			</li>
			<li class="nav-item {{ isActive('admin.footer*') }}">
				<a href="{{ route('admin.footer.index') }}" class="nav-link">
			          <span class="sidebar-icon">
						 <x-svg i="credit-card"/>
			          </span>
					<span class="sidebar-text">{{ __('Footer Manage') }}</span>
				</a>
			</li>
			
			{{--Blog Route --}}
			<li class="nav-item">
		        <span class="nav-link  collapsed  d-flex justify-content-between align-items-center" data-bs-toggle="collapse" data-bs-target="#submenu-blog"
		              aria-expanded="{{ isActive(['admin.blog*']) ? 'true' : 'false' }}">
		          <span>
		            <span class="sidebar-icon">
		              <x-svg i="bookmark"/>
		            </span>
		            <span class="sidebar-text">{{ __('Blog Manage') }}</span>
		          </span>
		          <span class="link-arrow">
		            <x-svg i="arrow-right"/>
		          </span>
		        </span>
				<div class="multi-level collapse {{ isActive(['admin.blog*']) }}"
				     role="list" id="submenu-blog" aria-expanded="false">
					<ul class="flex-column nav">
						<li class="nav-item {{ isActive('admin.blog.site*') }}">
							<a class="nav-link" href="{{ route('admin.blog.site.index') }}">
								<span class="sidebar-text">{{ __('Blog') }}</span>
							</a>
						</li>
						<li class="nav-item {{ isActive('admin.blog.category*') }}">
							<a class="nav-link" href="{{ route('admin.blog.category.index') }}">
								<span class="sidebar-text">{{ __('Category') }}</span>
							</a>
						</li>
					
					</ul>
				</div>
			</li>
			
			
			{{--Setting Route--}}
			<li class="nav-item  {{ isActive('admin.settings*') }}">
				<a href="{{ route('admin.settings.index') }}" class="nav-link">
		          <span class="sidebar-icon">
					<x-svg i="setting-1"/>
		          </span>
					<span class="sidebar-text">{{ __('Settings') }}</span>
				</a>
			</li>
			
			{{--Theme Route--}}
			<li class="nav-item  {{ isActive('admin.theme*') }}">
				<a href="{{ route('admin.theme.index') }}" class="nav-link">
		          <span class="sidebar-icon">
					<x-svg i="color"/>
		          </span>
					<span class="sidebar-text">{{ __('Theme Manage') }}</span>
				</a>
			</li>
			
			{{--Language Route--}}
			<li class="nav-item  {{ isActive('admin.language*') }}">
				<a href="{{ route('admin.language.index') }}" class="nav-link">
		          <span class="sidebar-icon">
					<x-svg i="language"/>
		          </span>
					<span class="sidebar-text">{{ __('Language Manage') }}</span>
				</a>
			</li>
			
			{{--Plugin Route--}}
			<li class="nav-item  {{ isActive('admin.plugin*') }}">
				<a href="{{ route('admin.plugin.index') }}" class="nav-link">
		          <span class="sidebar-icon">
					<x-svg i="swatch"/>
		          </span>
					<span class="sidebar-text">{{ __('Plugins') }}</span>
				</a>
			</li>
			
			{{--SEO Route--}}
			<li class="nav-item  {{ isActive('admin.seo*') }}">
				<a href="{{ route('admin.seo.index') }}" class="nav-link">
		          <span class="sidebar-icon">
					<x-svg i="sparkles"/>
		          </span>
					<span class="sidebar-text">{{ __('SEO Manage') }}</span>
				</a>
			</li>
			
			{{--social Route--}}
			<li class="nav-item  {{ isActive('admin.social*') }}">
				<a href="{{ route('admin.social.index') }}" class="nav-link">
		          <span class="sidebar-icon">
					<x-svg i="share"/>
		          </span>
					<span class="sidebar-text">{{ __('Social Links') }}</span>
				</a>
			</li>
			
			{{--Subscription Route--}}
			<li class="nav-item {{ isActive('admin.subscription*') }}">
				<a href="{{ route('admin.subscription') }}" class="nav-link">
		          <span class="sidebar-icon">
					<x-svg i="envelope"/>
		          </span>
					<span class="sidebar-text">{{ __('Subscription') }}</span>
				</a>
			</li>
			
			{{--Custom Css/Js Route--}}
			<li class="nav-item {{ isActive('admin.custom.type','css') }}">
				<a href="{{ route('admin.custom.type','css') }}" class="nav-link">
		          <span class="sidebar-icon">
					<x-svg i="braces"/>
		          </span>
					<span class="sidebar-text">{{ __('Custom CSS') }}</span>
				</a>
			</li>
			<li class="nav-item {{ isActive('admin.custom.type','script') }}">
				<a href="{{ route('admin.custom.type','script') }}" class="nav-link">
		          <span class="sidebar-icon">
					<x-svg i="code"/>
		          </span>
					<span class="sidebar-text">{{ __('Custom Script') }}</span>
				</a>
			</li>
			
			<li role="separator" class="dropdown-divider mt-4 mb-1 border-gray-700"></li>
			
			{{--Application Route--}}
			<li class="nav-item">
				<a href="{{ route('admin.optimize') }}" class="nav-link">
		          <span class="sidebar-icon">
					<x-svg i="rocket"/>
		          </span>
					<span class="sidebar-text">{{ __('Optimize Site') }}</span>
				</a>
			</li>
			<li class="nav-item">
				<a href="{{ route('admin.clear-cache') }}" class="nav-link">
		          <span class="sidebar-icon">
					<x-svg i="trash"/>
		          </span>
					<span class="sidebar-text">{{ __('Clear Cache') }}</span>
				</a>
			</li>
			<li class="nav-item {{ isActive('admin.app') }}">
				<a href="{{ route('admin.app') }}" class="nav-link d-flex align-items-center">
			          <span class="sidebar-icon ">
								<span class="sidebar-icon">
								  <x-svg i="info"/>
							   </span>
			          </span>
					<span class="sidebar-text">{{ __('Application') }} <span class="badge badge-sm bg-secondary ms-1 text-gray-800">v2.2</span></span>
				</a>
			</li>
		
		</ul>
	</div>
</nav>